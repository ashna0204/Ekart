$(document).ready(function () {
    function loadChildCategories(subcategoryId, selectedChildId = null){
        if (subcategoryId) {
            
            if (subcategoryId) {
                $.ajax({
                    url: "/get-childcategory/" + subcategoryId,
                    type: "GET",
                    success: function (response) {
                        $("#childcategory")
                            .empty()
                            .append(
                                '<option value="">Select Child category</option>'
                            );
                        $.each(response, function (key, value) {
                      let selected = selectedChildId == value.id ? "selected" : "";
                            $("#childcategory").append(
                                '<option value="' +
                                    value.id +
                                    '" ' +
                                    selected +
                                    ">" +
                                    value.name +
                                    "</option>"
                            );
                        });
                    },
                    error: function () {
                        $("#childcategory").html(
                            '<option value="">Something went wrong</option>'
                        );
                    },
                });
            } else {
                $("#childcategory").html(
                    '<option value="">select child Category</option>'
                );
            }
        }
    }

    $("#subcategory_id").on("change", function () {
        var subcategoryId = $(this).val();
        loadChildCategories(subcategoryId);
      });
        var subcategoryIdOnLoad = $("#subcategory_id").val();
        var selectedChildId = $("#selected_childcategory_id").val();
        if (subcategoryIdOnLoad && selectedChildId) {
            loadChildCategories(subcategoryIdOnLoad, selectedChildId);
        }
    
});
