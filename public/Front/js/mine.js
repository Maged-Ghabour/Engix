$(document).ready(function () {
    // Call Date Package Function
    $(".pickdate").pickadate({
        format: "yyyy-mm-dd",
        selectMonth: true,
        selectYear: true,
        clear: "clear",
        close: "Ok",
        closeOnSelect: true,
    });
    // function to calculate total price of the product
    $("#order-details").on("keyup blur", ".quantity", function () {
        let $row = $(this).closest("tr");
        let quantity = $row.find(".quantity").val() || 0;
        let unit_price = $row.find(".unit_price").val() || 0;
        $row.find(".product_total").val((quantity * unit_price).toFixed(2));
        $("#total").val(sum_total(".product_total"));
    });

    $("#order-details").on("keyup blur", ".unit_price", function () {
        let $row = $(this).closest("tr");
        let quantity = $row.find(".quantity").val() || 0;
        let unit_price = $row.find(".unit_price").val() || 0;
        $row.find(".product_total").val((quantity * unit_price).toFixed(2));

        $("#total").val(sum_total(".product_total"));
    });

    let sum_total = function ($selector) {
        let sum = 0;
        $($selector).each(function () {
            let selectorVal = $(this).val() != "" ? $(this).val() : 0;
            sum += parseFloat(selectorVal);
        });
        return sum.toFixed(2);
    };

    // Function to add Another Product With Adding HTML
    $(document).on("click", ".btn_add", function () {
        let trCount = $("#order-details").find("tr.cloning_row:last").length;
        let trIncreament =
            trCount > 0
                ? parseInt(
                      $("#order-details").find("tr.cloning_row:last").attr("id")
                  ) + 1
                : 0;

        $("#order-details")
            .find("tbody")
            .append(
                $(
                    "" +
                        '<tr class="cloning_row" id="' +
                        trIncreament +
                        '">' +
                        '<td><button type="button" class="btn btn-danger btn-sm new_product"><i class="fa fa-close"></i></button></td>' +
                        "<td>" +
                        '<input type="text" name="product_name[' +
                        trIncreament +
                        ']" class="product_name form-control">' +
                        "</td>" +
                        "<td>" +
                        '<input type="number" step="0.01" name="quantity[' +
                        trIncreament +
                        ']" class="quantity form-control">' +
                        "</td>" +
                        "<td>" +
                        '<input type="number" step="0.01" name="unit_price[' +
                        trIncreament +
                        ']" class="unit_price form-control">' +
                        "</td>" +
                        "<td>" +
                        '<input type="number" step="0.01" name="product_total[' +
                        trIncreament +
                        ']" class="product_total form-control"  readonly="readonly">' +
                        "</td>" +
                        "</tr>"
                )
            );
    });
    // Function To Add New Product With Calculation Of The Operations
    $(document).on("click", ".new_product", function (e) {
        e.preventDefault();
        $(this).parent().parent().remove();

        $("#total").val(sum_total(".product_total"));
    });

    $("#form").on("submit", function (e) {
        $("input.product_name").each(function () {
            $(this).rules("add", { required: true });
        }),
            $("input.quantity").each(function () {
                $(this).rules("add", { required: true });
            }),
            $("input.unit_price").each(function () {
                $(this).rules("add", { required: true });
            }),
            $("input.product_total").each(function () {
                $(this).rules("add", { required: true });
            }),
            e.preventDefault();
    });

    // Start Form Validation
    $("#form").validate({
        rules: {
            customer_name: { required: true, minlength: 3, maxlength: 50 },
            customer_mobile: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 14,
            },
            order_number: { required: true, digits: true },
            order_date: { required: true },
        },
        submitHandler: function (form) {
            form.submit();
        },
    });
});
