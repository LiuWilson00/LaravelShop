import React, { useEffect, useState } from "react";
import { Table, Image, Input, InputNumber, Button } from "antd";
import Cookies from "js-cookie";
const Cart = () => {
    const [cart, setCart] = useState([]);
    const columns = [
        {
            title: "Product Name",
            width: 200,
            dataIndex: "name",
            key: "cart_name",
        },
        {
            title: "Price",
            width: 100,
            dataIndex: "price",
            key: "cart_price",
        },
        {
            title: "Quantity",
            width: 200,
            dataIndex: "quantity",
            key: "cart_quantity",
            render: (_, recoud) => {
                return (
                    <InputNumber
                        value={recoud.quantity}
                        onChange={(el) => {
                            updateCartItemQuantity(el, recoud);
                        }}
                    ></InputNumber>
                );
            },
        },
        {
            title: "image",
            dataIndex: "imgUrl",
            key: "cart_imgUrl",
            render: (text) => <Image width="300" src={text}></Image>,
        },
        {
            title: "option",
            dataIndex: "imgUrl",
            key: "cart_option",
            render: (_, record) => (
                <Button
                    type="text"
                    color="red"
                    onClick={() => {
                        deleteCartItem(record.id);
                    }}
                >
                    Delete
                </Button>
            ),
        },
    ];

    const updateCartItemQuantity = (newValue, cartItem) => {
        const newCart = cart;
        const targetKey = newCart.findIndex((c) => cartItem.id === c.id);

        if (targetKey == -1) return;
        newCart[targetKey].quantity = newValue;
        updateCartValue(newCart);
    };
    const deleteCartItem = (targetId) => {
        const newCart = cart;
        const targetKey = newCart.findIndex((c) => targetId === c.id);
        newCart.splice(targetKey, 1);
        updateCartValue(newCart);
    };
    const initCart = () => {
        const cartCookie = Cookies.get("cart");
        const newCart = cartCookie ? JSON.parse(cartCookie) : [];
        setCart(newCart);
    };

    const updateCartValue = (val) => {
        const newCartString = JSON.stringify(val);
        setCart(JSON.parse(newCartString));
        Cookies.set("cart", newCartString);
    };

    useEffect(() => {
        initCart();
    }, []);
    return (
        <div className="cart-main">
            <Table columns={columns} rowKey="key" dataSource={cart}></Table>
        </div>
    );
};

export default Cart;
