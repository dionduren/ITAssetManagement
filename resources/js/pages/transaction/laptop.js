import { TabulatorFull as Tabulator } from "tabulator-tables";

document.addEventListener("DOMContentLoaded", function () {
  if (document.querySelector("#tabulator-laptop")) {
    let tableData = window.laptopData;

    let tabulator = new Tabulator("#tabulator-laptop", {
      data: tableData,
      layout: "fitColumns",
      pagination: "local",
      paginationSize: 10,
      paginationSizeSelector: [10, 20, 30, 50],
      placeholder: "No matching records found",
      columns: [
        { title: "Employee No", field: "emp_no", sorter: "number" },
        { title: "Laptop Model", field: "Laptop", sorter: "string" },
        { title: "Asset Number", field: "no_asset", sorter: "string" },
      ],
    });

    document.getElementById("tabulator-print")?.addEventListener("click", function () {
      tabulator.print();
    });

    document.getElementById("tabulator-export-csv")?.addEventListener("click", function () {
      tabulator.download("csv", "laptop_inventory.csv");
    });

    document.getElementById("tabulator-export-json")?.addEventListener("click", function () {
      tabulator.download("json", "laptop_inventory.json");
    });
  }
});
