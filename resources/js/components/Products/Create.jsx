import React, { useEffect, useState } from "react";
import Cookies from "js-cookie";
import { Input, Upload, Button } from "antd";
import { Modal } from "antd";
import { UploadOutlined } from "@ant-design/icons";
import axios from "axios";

const { info } = Modal;
const ProductCreate = (props) => {
    const { name, price, backHref, imgUrl, id } = props;

    return (
        <div>
            <h1>Create Product</h1>
            <a href={backHref}>back</a>
            <div>
                <Input
                    type="text"
                    name="name"
                    defaultValue={name}
                    placeholder="plese enter product name"
                />
                <Input
                    type="number"
                    name="price"
                    defaultValue={price}
                    placeholder="plese enter product price"
                />
                <input
                    type="file"
                    name="image"
                    placeholder="plese enter product image"
                    onChange={(el) => {
                        console.log(el);
                    }}
                />
                <button type="submit">submit</button>
            </div>
        </div>
    );
};

export default ProductCreate;
