import ReactDom from "react-dom";
import Products from "./components/Products";
import Cart from "./components/Cart";
import Members from "./components/Members";
import "antd/dist/antd.css";

require("./bootstrap");

import Alpine from "alpinejs";

window.Alpine = Alpine;

window.render = {
    Cart: {
        index: (props = {}, tag = "main") => {
            componentRenderByReactDom(props, Cart.main, tag);
        },
    },
    Products: {
        show: (props = {}, tag = "main") => {
            componentRenderByReactDom(props, Products.show, tag);
        },
        create: (props = {}, tag = "main") => {
            componentRenderByReactDom(props, Products.create, tag);
        },
        edit: (props = {}, tag = "main") => {
            componentRenderByReactDom(props, Products.edit, tag);
        },
    },
    Members: {
        register: (props = {}, tag = "main") => {
            componentRenderByReactDom(props, Members.register, tag);
        },
        login: (props = {}, tag = "main") => {
            componentRenderByReactDom(props, Members.login, tag);
        },
    },
};

const componentRenderByReactDom = (props, Component, tag) => {
    ReactDom.render(
        <Component {...props}></Component>,
        document.getElementById(tag)
    );
};

Alpine.start();
