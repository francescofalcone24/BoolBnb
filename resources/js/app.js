import './bootstrap';
import '~resources/scss/app.scss';
import boostrap from "bootstrap/dist/js/bootstrap.min.js";
import.meta.glob([
    '../img/**'
])

function getSearch(value){
    let search_input = value.target.value
    console.log(search_input)
}
       