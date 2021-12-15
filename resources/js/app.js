import ReactDom from "react-dom";
import Products from "./components/Products";
import Cart from "./components/Cart";
import "antd/dist/antd.css";
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
};

const componentRenderByReactDom = (props, Component, tag) => {
    ReactDom.render(
        <Component {...props}></Component>,
        document.getElementById(tag)
    );
};
