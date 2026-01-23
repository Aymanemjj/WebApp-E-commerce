/*!
* Start Bootstrap - Shop Homepage v5.0.6 (https://startbootstrap.com/template/shop-homepage)
* Copyright 2013-2023 Start Bootstrap
* Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-shop-homepage/blob/master/LICENSE)
*/
// This file is intentionally blank
// Use this file to add JavaScript to your project



window.addEventListener('DOMContentLoaded', event => {

    // Toggle the side navigation
    const sidebarToggle = document.body.querySelector('#sidebarToggle');
    if (sidebarToggle) {
        // Uncomment Below to persist sidebar toggle between refreshes
        // if (localStorage.getItem('sb|sidebar-toggle') === 'true') {
        //     document.body.classList.toggle('sb-sidenav-toggled');
        // }
        sidebarToggle.addEventListener('click', event => {
            event.preventDefault();
            document.body.classList.toggle('sb-sidenav-toggled');
            localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
        });
    }

});


const newProductBtn = document.getElementById("product-creat");
const newCategoryBtn = document.getElementById("category-creat");
const newUserBtn = document.getElementById("user-creat");

const newProductModal = document.getElementById("product-modal");
const newCategoryModal = document.getElementById("category-modal");
const newUserModal = document.getElementById("user-modal");

const categoryModalClose = document.getElementById('categoryModalClose');
const productModalClose = document.getElementById('productModalClose');
const userModalClose = document.getElementById('userModalClose');

newProductBtn.addEventListener("click", showModal);
newCategoryBtn.addEventListener("click", showModal);
newUserBtn.addEventListener("click", showModal);


productModalClose.addEventListener("click", closeModal);
categoryModalClose.addEventListener("click", closeModal);
userModalClose.addEventListener("click", closeModal);

function showModal(e) {
    if (e.target.id === "product-creat") {
        newProductModal.classList = "";
    } else if (e.target.id === "category-creat") {
        newCategoryModal.classList = "";
    }else if(e.target.id ==="user-creat"){
        newUserModal.classList= "";
    }
}

function closeModal(e) {
    if (e.target.id === "productModalClose") {
        newProductModal.classList = "modal";
    } else if (e.target.id === "categoryModalClose") {
        newCategoryModal.classList = "modal";
    }else if(e.target.id === "userModalClose") {
        userModalClose.classList = "modal";
    }
}