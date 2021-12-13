import ReactDom from "react-dom";
import Product from "./components/Product";
import Cart from "./components/Cart";
import "antd/dist/antd.css";
window.render = {
  Cart: (props = {}, tag = "main") => {
    componentRenderByReactDom(props, Cart, tag);
  },
  Product: (props = {}, tag = "main") => {
    componentRenderByReactDom(props, Product, tag);
  },
};

const componentRenderByReactDom = (props, Component, tag) => {
  ReactDom.render(
    <Component {...props}></Component>,
    document.getElementById(tag)
  );
};
