import { TabulatorFull as Tabulator } from "tabulator-tables";

document.addEventListener("DOMContentLoaded", function () {
  if (document.querySelector("#tabulator-user")) {
    let tableData = window.userData;

    let tabulator = new Tabulator("#tabulator-user", {
      data: tableData,
      layout: "fitColumns",
      pagination: "local",
      paginationSize: 10,
      paginationSizeSelector: [10, 20, 30, 50],
      placeholder: "No matching records found",
      columns: [
        { title: "Employee No", field: "emp_no", sorter: "number" },
        { title: "Name", field: "nama", sorter: "string" },
        { title: "Employee Status", field: "employee_status", sorter: "string" },
        { title: "Position Title", field: "pos_title", sorter: "string" },
      ],
    });

    document.getElementById("tabulator-print")?.addEventListener("click", function () {
      tabulator.print();
    });

    document.getElementById("tabulator-export-csv")?.addEventListener("click", function () {
      tabulator.download("csv", "user_directory.csv");
    });

    document.getElementById("tabulator-export-json")?.addEventListener("click", function () {
      tabulator.download("json", "user_directory.json");
    });
  }
});
