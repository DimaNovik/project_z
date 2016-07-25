
$(document).ready(function () {
    var checkbox = $('#visibility1');
    var dependent = $('#list_warning');
    var date_count = $('#date_count');
    var count_zone_1 = $('#count_zone_1');
    var desc = $('#desc');
    var visibility2 = $('#visibility2');
    var label_desc = $('#label_desc');
    var label_date = $('#label_date');
    var label_zone = $('#label_zone_1');
    var label_visibility2 = $('#label_visibility2');


    if (checkbox.attr('checked') !== undefined){
       dependent.show();
       desc.hide();
       date_count.hide();
       count_zone_1.hide();
        visibility2.hide();
        label_desc.hide();
        label_date.hide();
        label_zone.hide();
        label_visibility2.hide();
    } else {
        dependent.hide();

    }

    checkbox.change(function(e){
      dependent.toggle();
      desc.toggle();
      date_count.toggle();
      count_zone_1.toggle();
      visibility2.toggle();
      label_desc.toggle();
      label_date.toggle();
      label_zone.toggle();
      label_visibility2.toggle();

    });
});
