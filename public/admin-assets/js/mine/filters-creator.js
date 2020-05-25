var input_type;

$('#mdl-filters-creator').on('show.bs.modal', function (e) {

    input_type = 'text';
    console.log(selected_properties);

    var select_properties = $('select[name=properties]', this);
    select_properties.html("");
    select_properties.append('<option value="" disabled selected>انتخاب خاصیت</option>');
    $.each(selected_properties, function (index, value) {
        select_properties.append("<option value='" + value.title + "'>" + value.title + "</option>");
    });

    var select_operators = $('select[name=operators]', this);
    select_operators.html("");
});


$('#mdl-filters-creator select[name=properties]').change(function () {

    // alert($(this).val());
    var cur_val = $(this).val();
    $.each(selected_properties, function (index, value) {

        if (value.title === cur_val) {
            // console.log(value.title);
            input_type = value.input_type;
        }

    });

    var select_operators = $('#mdl-filters-creator select[name=operators]');
    var operts_to_add = input_type_filter_operators[input_type];
    select_operators.html("");
    select_operators.append('<option value="" disabled selected>انتخاب عملگر</option>');
    $.each(operts_to_add, function (ind, vlu) {
        select_operators.append("<option value='" + vlu + "'>" + filter_operators_locale[vlu] + "  (" + vlu + ")" + "</option>");
    });

});


$('#mdl-filters-creator input[name=values]').click(function () {

    if (input_type === 'nestable') {
        // alert("nestable");
        $('#mdl-category-selector').modal('show');
    }
});


$('#mdl-filters-creator button[name=add-filter]').click(function () {

    if ($('#mdl-filters-creator select[name=operators]').val() == ''
        || $('#mdl-filters-creator select[name=properties]').val() == ''
        || $('#mdl-filters-creator input[name=values]').val() == '') {

        alert("همه گزینه ها را پر نمایید.");
        return;
    }

    var operator = $('#mdl-filters-creator select[name=operators]').val();
    var property = $('#mdl-filters-creator select[name=properties]').val();
    var values = $('#mdl-filters-creator input[name=values]').val();

    if (operator === 'lt' || operator === 'lte' || operator === 'gt' || operator === 'gte') {

        vals = values.split(',');
        if (vals.length > 1) {
            alert('برای استفاده از عملگر مورد نظر ,تنها یه عدد وارد نمایید');
            return;
        }

        if (Number(values.trim()) == null || Number(values.trim()) != values.trim()) {
            alert('برای استفاده از عملگر مورد نظر ,تنها یه عدد وارد نمایید');
            return;
        }

    }

    if (operator === 'bt') {

        vals = values.split(',');

        if (vals.length !== 2) {
            alert('برای استفاده از عملگر مورد نظر باید حتما دو عدد که توسط "," جدا شده است وارد نمایید');
            return;
        }

        if ((Number(vals[0].trim()) == null || Number(vals[0].trim()) != vals[0].trim())
            || (Number(vals[1].trim()) == null || Number(vals[1].trim()) != vals[1].trim())) {
            alert('برای استفاده از عملگر مورد نظر باید حتما دو عدد که توسط "," جدا شده است وارد نمایید');
            return;
        }


    }


    var tbody = $('#mdl-filters-creator table tbody');
    var s = `<tr><td>${property}</td><td>${operator}</td><td>${values}</td><td><a href="#" onclick="$(this).parent().parent().remove();"><i class="fa fa-remove"></i></a></td></tr>`;
    tbody.append(s);

});


$('#mdl-filters-creator button[name=send]').click(function () {


    var tbody = $('#mdl-filters-creator table tbody');

    var trs = tbody.find('tr');
    var filters = [];
    var s_filters = '';
    $.each(trs, function (index, tr) {
        var property = $(tr).find('td:nth-child(1)').html().trim();
        var operator = $(tr).find('td:nth-child(2)').html().trim();
        var values = $(tr).find('td:nth-child(3)').html().trim();


        if (s_filters.trim() !== "") {
            s_filters += ',';
        }


        if (Array.isArray(values.split(','))) {
            values = values.split(',');
            if (values.length > 1) {
                values = "[" + values + "]";
            } else {
                values = '"' + values + '"';
            }
        } else {
            values = '"' + values + '"';
        }

        s_filters += '"' + property + '":{"values":' + values + ',"operator":"' + operator + '"}';

        // filters.push({property: {'values': values, 'operator': operator}});
        //  console.log(property, operator, values);
        // console.log(JSON.parse())

    });
    s_filters = '{' + s_filters + '}';
    // s_filters = '[' + s_filters + ']';
    // console.log(JSON.parse(s_filters));


    $('input[name=txt-news-filters]').val(s_filters);

    $('#mdl-filters-creator').modal('hide');

    // console.log(s_filters);

});




















