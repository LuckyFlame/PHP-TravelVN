// Set Date Time Language
(function($) {

    $.datepicker.regional['vi'] = {
        monthNames: ["Tháng Một", "Tháng Hai", "Tháng Ba", "Tháng Tư", "Tháng Năm", "Tháng Sáu", "Tháng Bảy", "Tháng Tám", "Tháng Chín", "Tháng Mười", "Tháng Mười Một", "Tháng Mười Hai"],
        dayNames: ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'],
        dayNamesShort:  ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
        dayNamesMin: ['CN', 'T2', 'T3', 'T4', 'T5', 'T6', 'T7'],
        days: ['Chủ Nhật', 'Thứ Hai', 'Thứ Ba', 'Thứ Tư', 'Thứ Năm', 'Thứ Sáu', 'Thứ Bảy'],
    };
    
    $.datepicker.setDefaults($.datepicker.regional['vi']);

})(jQuery);

// calcDate
function calcDate() {
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0'); // January is 0
    var yyyy = today.getFullYear();
    today = dd + '/' + mm + '/' + yyyy;

    return today;
}

// App
function App() {
    // Check
    if(document.querySelector(".section-profile")) {

        // Call Variables
        const optionMenu = document.querySelector(".select-menu");
        const selectButton = document.querySelector(".select-button");
        const options = document.querySelectorAll(".select-option li");
        const inT = document.querySelector(".select-title");
        const valueGender = document.querySelector(".input-gender");

        // Datepicker
        (function($) {

            $("#form-profile .input-datepicker").datepicker({
                dateFormat: "dd/mm/yy",
                minDate: new Date("01/01/1970"),
                maxDate: calcDate(),
                duration: "fast",
            });

        })(jQuery);

        selectButton.addEventListener("click", () => {
            optionMenu.classList.toggle("active");
        });

        // Select Option
        options.forEach(op => {
            op.addEventListener("click", () => {
                let selectOp = op.querySelector(".option-title").innerText;

                inT.innerText = selectOp;

                if(selectOp == "Khác") {
                    valueGender.setAttribute("value", "");
                } else {
                    valueGender.setAttribute("value", selectOp);
                }

                optionMenu.classList.remove("active");
                selectButton.classList.add("hasActive");
            });
        });

    }
}

App();

