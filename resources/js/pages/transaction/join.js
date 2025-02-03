import { TabulatorFull as Tabulator } from "tabulator-tables";


document.addEventListener("DOMContentLoaded", function () {
  if (document.querySelector("#tabulator")) {
    // Load data from Laravel's JSON output
    let tableData = window.tableData;

    // Initialize Tabulator
    let tabulator = new Tabulator("#tabulator", {
      data: tableData, // Use JSON data from Laravel
      layout: "fitColumns",
      pagination: "local",
      paginationSize: 10,
      paginationSizeSelector: [10, 20, 30, 50],
      placeholder: "No matching records found",
      columns: [
        { title: "NIK", field: "emp_no", sorter: "number" },
        { title: "Nama", field: "nama", sorter: "string" },
        { title: "Status", field: "employee_status", sorter: "string" },
        { title: "Jabatan", field: "pos_title", sorter: "string" },
        { title: "Laptop", field: "laptop", sorter: "string" },
        { title: "Asset No", field: "asset_no", sorter: "string" },
        {
          title: "Actions",
          field: "actions",
          hozAlign: "center",
          formatter(cell) {
            return `
                            <div class="flex items-center justify-center">
                                <a class="edit-btn text-blue-500 mr-2 cursor-pointer" data-emp-no="${cell.getData().emp_no}">
                                    <i data-lucide="edit" class="w-4 h-4"></i> Edit
                                </a>
                                <a class="delete-btn text-red-500 cursor-pointer" data-emp-no="${cell.getData().emp_no}">
                                    <i data-lucide="trash" class="w-4 h-4"></i> Delete
                                </a>
                            </div>
                        `;
          },
        },
      ],
    });

    // Search & Filter Logic
    document.getElementById("tabulator-html-filter-go").addEventListener("click", function () {
      let field = document.getElementById("tabulator-html-filter-field").value;
      let type = document.getElementById("tabulator-html-filter-type").value;
      let value = document.getElementById("tabulator-html-filter-value").value;
      tabulator.setFilter(field, type, value);
    });

    document.getElementById("tabulator-html-filter-reset").addEventListener("click", function () {
      tabulator.clearFilter();
    });

    // Export
    document.getElementById("tabulator-export-csv").addEventListener("click", function () {
      tabulator.download("csv", "employee_laptops.csv");
    });

    document.getElementById("tabulator-export-json").addEventListener("click", function () {
      tabulator.download("json", "employee_laptops.json");
    });

    document.getElementById("tabulator-export-xlsx").addEventListener("click", function () {
      tabulator.download("xlsx", "employee_laptops.xlsx", { sheetName: "Laptops" });
    });

    document.getElementById("tabulator-export-html").addEventListener("click", function () {
      tabulator.download("html", "employee_laptops.html", { style: true });
    });

    // Print
    document.getElementById("tabulator-print").addEventListener("click", function () {
      tabulator.print();
    });

    // Edit & Delete Actions
    document.addEventListener("click", function (event) {
      if (event.target.closest(".edit-btn")) {
        let empNo = event.target.closest(".edit-btn").getAttribute("data-emp-no");
        alert(`Edit employee ${empNo}`);
      }
      if (event.target.closest(".delete-btn")) {
        let empNo = event.target.closest(".delete-btn").getAttribute("data-emp-no");
        alert(`Delete employee ${empNo}`);
      }
    });
  }
});
