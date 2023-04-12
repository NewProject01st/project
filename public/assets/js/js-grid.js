(function($) {
  'use strict';
  $(function() {

    //basic config
    if ($("#js-grid").length) {
      $("#js-grid").jsGrid({
        height: "500px",
        width: "100%",
        filtering: true,
        editing: true,
        inserting: true,
        sorting: true,
        paging: true,
        autoload: true,
        pageSize: 15,
        pageButtonCount: 5,
        deleteConfirm: "Do you really want to delete the client?",
        data: db.clients,
        fields: [{
            name: "Sr. No.",
            type: "number",
            width: 40
          },
          {
            name: "Item Description",
            type: "text",
            width: 150
          },
          {
            name: "Status",
            type: "text",
            width: 100
          },
          {
            name: "Remark",
            type: "select",
            items: db.countries,
            valueField: "Id",
            textField: "Name"
          },
          {
            name: "Document Check",
            title: "Is Correct",
            itemTemplate: function(value, item) {
              return $("<div>")
                .addClass("form-check mt-0")
                .append(
                  $("<label>").addClass("form-check-label")
                  .append(
                    $("<input>").attr("type", "checkbox")
                    .addClass("form-check-input")
                    .attr("checked", value || item.Checked)
                    .on("change", function() {
                      item.Checked = $(this).is(":checked");
                    })
                  )
                  .append('<i class="input-helper"></i>')
                );
            }
          },
          {
            type: "control"
          }
        ]
      });
    }


    //Static
    if ($("#js-grid-static").length) {
      $("#js-grid-static").jsGrid({
        height: "500px",
        width: "100%",

        sorting: true,
        paging: true,

        data: db.clients,

        fields: [{
            name: "Sr. No.",
            type: "number",
            width: 20
          },
          {
            name: "Item Description",
            type: "text",
            width: 200
          },
          {
            name: "Status",
            type: "text",
            width: 100
          },
          {
            name: "Remark",
            type: "select",
            items: db.countries,
            valueField: "Id",
            textField: "Name"
          },
          {
            name: "Document Check",
            title: "Is Correct",
            itemTemplate: function(value, item) {
              return $("<div>")
                .addClass("form-check mt-0")
                .append(
                  $("<label>").addClass("form-check-label")
                  .append(
                    $("<input>").attr("type", "checkbox")
                    .addClass("form-check-input")
                    .attr("checked", value || item.Checked)
                    .on("change", function() {
                      item.Checked = $(this).is(":checked");
                    })
                  )
                  .append('<i class="input-helper"></i>')
                );
            }
          }
        ]
      });
    }

    //sortable
    if ($("#js-grid-sortable").length) {
      $("#js-grid-sortable").jsGrid({
        height: "200px",
        width: "100%",

        autoload: true,
        selecting: false,

        controller: db,

        fields: [{
            name: "Sr. No.",
            type: "number",
            width: 150
          },
          {
            name: "Item Description",
            type: "text",
            width: 50
          },
          {
            name: "Status",
            type: "text",
            width: 200
          },
          {
            name: "Remark",
            type: "select",
            items: db.countries,
            valueField: "Id",
            textField: "Name"
          },
          {
            name: "Document Check",
            title: "Is Correct",
            itemTemplate: function(value, item) {
              return $("<div>")
                .addClass("form-check mt-0")
                .append(
                  $("<label>").addClass("form-check-label")
                  .append(
                    $("<input>").attr("type", "checkbox")
                    .addClass("form-check-input")
                    .attr("checked", value || item.Checked)
                    .on("change", function() {
                      item.Checked = $(this).is(":checked");
                    })
                  )
                  .append('<i class="input-helper"></i>')
                );
            }
          }
        ]
      });
    }

    if ($("#sort").length) {
      $("#sort").on("click", function() {
        var field = $("#sortingField").val();
        $("#js-grid-sortable").jsGrid("sort", field);
      });
    }

  });
})(jQuery);