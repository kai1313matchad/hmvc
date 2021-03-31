let Product = {
    setSort: function(elm, search, category, size, city) {
        console.log($(elm).val());
        if ($(elm).val() != '') {
            location.replace(`read?search=${search}&category=${category}&size=${size}&city=${city}&page=1&limit=12&sort=${$(elm).val()}`);
        } else {
            location.replace(`read?search=${search}&category=${category}&size=${size}&city=${city}&page=1&limit=12&sort=`);
        }
    },
    setFilterCategory: function(elm, search, size, city, sort) {
        console.log($(elm).val());
        if ($(elm).val() != '') {
            location.replace(`read?search=${search}&category=${$(elm).val()}&size=${size}&city=${city}&page=1&limit=12&sort=${sort}`);
        } else {
            location.replace(`read?search=${search}&category=&size=${size}&city=${city}&page=1&limit=12&sort=${sort}`);
        }
    },
    setFilterCity: function(elm, search, size, category, sort) {
        console.log($(elm).val());
        if ($(elm).val() != '') {
            location.replace(`read?search=${search}&category=${category}&size=${size}&city=${$(elm).val()}&page=1&limit=12&sort=${sort}`);
        } else {
            location.replace(`read?search=${search}&category=${category}&size=${size}&city=&page=1&limit=12&sort=${sort}`);
        }
    },
    setFilterSize: function(elm, search, city, category, sort) {
        console.log($(elm).val());
        if ($(elm).val() != '') {
            location.replace(`read?search=${search}&category=${category}&city=${city}&size=${$(elm).val()}&page=1&limit=12&sort=${sort}`);
        } else {
            location.replace(`read?search=${search}&category=${category}&city=${city}&size=&page=1&limit=12&sort=${sort}`);
        }
    },
    setFilterSearch: function(elm, size, city, category, sort) {
        let search = $('.inp-search').val();
        // console.log(search);
        if (search != '') {
            location.replace(`read?search=${search}&category=${category}&city=${city}&size=${size}&page=1&limit=12&sort=${sort}`);
        } else {
            location.replace(`read?search=&category=${category}&city=${city}&size=${size}&page=1&limit=12&sort=${sort}`);
        }
    }
}