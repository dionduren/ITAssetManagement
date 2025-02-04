import { TabulatorFull as Tabulator } from "tabulator-tables";

document.addEventListener("DOMContentLoaded", function () {
  let roleTable = new Tabulator("#tabulator", {
    ajaxURL: "/roles",
    layout: "fitColumns",
    pagination: "local",
    paginationSize: 10,
    paginationSizeSelector: [10, 20, 30],
    columns: [
      { title: "ID", field: "id", visible: false },
      { title: "Role Name", field: "name", sorter: "string" },
      { title: "Description", field: "description", sorter: "string" },
      { title: "Deleted At", field: "deleted_at", visible: false },
      {
        title: "Actions",
        formatter: function (cell) {
          let role = cell.getData();
          if (role.deleted_at) {
            return `
                            <button class="btn btn-success restore-role-btn" data-id="${role.id}">Restore</button>
                            <button class="btn btn-danger force-delete-role-btn" data-id="${role.id}">Force Delete</button>
                        `;
          } else {
            return `
                            <button class="btn btn-primary edit-role-btn" data-id="${role.id}" data-bs-toggle="modal" data-bs-target="#roleModal">Edit</button>
                            <button class="btn btn-warning delete-role-btn" data-id="${role.id}">Delete</button>
                        `;
          }
        },
      },
    ],
  });

  // Open Create Modal
  document.getElementById("open-create-modal").addEventListener("click", function () {
    document.getElementById("role-form").reset();
    document.getElementById("role-id").value = "";
    document.getElementById("roleModalLabel").innerText = "Add Role";
  });

  // Submit Role Form (Create / Edit)
  document.getElementById("role-form").addEventListener("submit", function (event) {
    event.preventDefault();

    let roleId = document.getElementById("role-id").value;
    let url = roleId ? `/roles/${roleId}` : "/roles";
    let method = roleId ? "PUT" : "POST";
    let formData = new FormData(this);

    fetch(url, {
      method: method,
      body: formData,
      headers: { "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content },
    })
      .then(response => response.json())
      .then(() => {
        let modal = bootstrap.Modal.getInstance(document.getElementById("roleModal"));
        modal.hide();
        roleTable.setData();
      });
  });

  // Edit Role
  document.addEventListener("click", function (event) {
    if (event.target.classList.contains("edit-role-btn")) {
      let roleId = event.target.getAttribute("data-id");
      fetch(`/roles/${roleId}`)
        .then(response => response.json())
        .then(role => {
          document.getElementById("roleModalLabel").innerText = "Edit Role";
          document.getElementById("role-id").value = role.id;
          document.getElementById("role-name").value = role.name;
          document.getElementById("role-description").value = role.description;
        });
    }
  });

  // Soft Delete Role
  document.addEventListener("click", function (event) {
    if (event.target.classList.contains("delete-role-btn")) {
      let roleId = event.target.getAttribute("data-id");
      if (confirm("Are you sure you want to delete this role?")) {
        fetch(`/roles/${roleId}`, { method: "DELETE" })
          .then(() => roleTable.setData());
      }
    }
  });

  // Restore Role
  document.addEventListener("click", function (event) {
    if (event.target.classList.contains("restore-role-btn")) {
      let roleId = event.target.getAttribute("data-id");
      fetch(`/roles/${roleId}/restore`, { method: "POST" })
        .then(() => roleTable.setData());
    }
  });

  // Force Delete Role
  document.addEventListener("click", function (event) {
    if (event.target.classList.contains("force-delete-role-btn")) {
      let roleId = event.target.getAttribute("data-id");
      if (confirm("Are you sure you want to permanently delete this role?")) {
        fetch(`/roles/${roleId}/force-delete`, { method: "DELETE" })
          .then(() => roleTable.setData());
      }
    }
  });
});
