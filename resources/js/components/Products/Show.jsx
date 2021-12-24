import React, { useEffect, useState } from "react";
import Cookies from "js-cookie";
import { Modal } from "antd";

const { info } = Modal;
const Product = (props) => {
    const { name, price, backHref, imgUrl, id, categoriesList, category_naem } =
        props;
    const [productNum, setProductNum] = useState(1);
    const [init, setInit] = useState(false);
    const [cart, setCart] = useState([]);
    const initCart = () => {
        const cartCookie = Cookies.get("cart");
        const newCart = cartCookie ? JSON.parse(cartCookie) : [];

        setCart(newCart);
        setTimeout(() => {
            setInit(true);
        });
    };

    const addProductToCart = () => {
        const target = findCurrentCartItemIndex();
        const newCart = addQuantityToCartByIndex(target, productNum);
        updateCartData(newCart);
    };

    const addQuantityToCartByIndex = (targetIndex, addQuantity) => {
        let newCart = JSON.parse(JSON.stringify(cart));
        if (targetIndex == -1) {
            newCart = [
                ...newCart,
                {
                    id,
                    name,
                    price,
                    imgUrl,
                    quantity: parseInt(addQuantity),
                },
            ];
        } else {
            const oldQuantity = parseInt(newCart[targetIndex].quantity ?? 0);
            newCart[targetIndex] = {
                id,
                name,
                price,
                imgUrl,
                quantity: oldQuantity + parseInt(addQuantity),
            };
        }
        return newCart;
    };

    const updateCartData = (newCart) => {
        Cookies.set("cart", JSON.stringify(newCart));
        setCart(newCart);
    };

    const alertCurrentCartItemInfo = () => {
        const currentCartItem = findCurrentCartItem();
        info({
            content: currentCartItem.quantity,
        });
    };

    const findCurrentCartItem = () => {
        const currentCartItem = cart.find((c) => c.id == id);
        return currentCartItem;
    };
    const findCurrentCartItemIndex = () => {
        const cruuentItemIndex = cart.findIndex((c) => c.id == id);
        return cruuentItemIndex;
    };
    useEffect(() => {
        if (!init) return;
        alertCurrentCartItemInfo();
    }, [cart]);

    useEffect(() => {
        initCart();
    }, []);

    return (
        <div>
            <a href={backHref}>back</a>
            <div style={{ display: "flex" }}>
                {categoriesList.map((c) => (
                    <div style={{ marginRight: 10 }}>
                        <a key={c.category_id} href={c.url}>
                            {c.name}
                        </a>
                    </div>
                ))}
            </div>
            <div>
                <input
                    onChange={(el) => {
                        setProductNum(el.target.value);
                    }}
                    value={productNum}
                    type="number"
                />
                <button
                    onClick={() => {
                        addProductToCart();
                    }}
                    className="add-cart"
                    type="button"
                >
                    add to cart
                </button>
            </div>
            <div>
                <h1> {name}</h1>
                <h2>Price: {price}</h2>
            </div>
            <div>
                <img src={imgUrl} width="400" alt="product" />
            </div>
        </div>
    );
};

export default Product;
