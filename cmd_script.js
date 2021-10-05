function deleteGenre(id) {
    let confirmation = window.confirm("Are you sure want to delete?");
    if (confirmation){
        window.location = "?mn=genre&tok=del&did=" + id;
    }
}

//ES6
const editGenre = (param1) => {
    window.location = "?mn=up_genre&uid=" + param1;
}
