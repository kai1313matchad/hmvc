let Promotions = {
    setFilter: function(elm) {
        console.log($(elm).val());
        if ($(elm).val() != 0) {
            location.replace(`read?city=&page=1&limit=12&sortName=${$(elm).val()}`);
        } else {
            location.replace(`read?city=&page=1&limit=12&sortName=`);
        }
    }
}