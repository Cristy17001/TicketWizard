

function filter_rows() {
    allFilters = document.querySelectorAll(".form-filter")
    var filter_value_dict = {}
    allFilters.forEach((filter_i) => {
        col_index = filter_i.getAttribute('col-index')
        value = filter_i.value
        if (value != "") {
            filter_value_dict[col_index] = value;
        }
    });

    var col_cell_value_dict = {};

    const rows = document.querySelectorAll("#ticket");
    rows.forEach((row) => {
        var display_row = true;
        allFilters.forEach((filter_i) => {
            col_index = filter_i.getAttribute('col-index')
            col_cell_value_dict[col_index] = row.querySelector(".backSide :nth-child(" + col_index + ")").innerHTML
        })

        for (var col_i in filter_value_dict) {
            filter_value = filter_value_dict[col_i]
            row_cell_value = col_cell_value_dict[col_i]

            if (row_cell_value.indexOf(filter_value) == -1 && filter_value != "") {
                display_row = false;
                break;
            }
        }
        if (display_row != true) {
            row.style.display = "none"
        } else {
            row.style.display = "block"
        }
    })

}