import React, { useState } from "react";
import Cookies from "js-cookie";
import { Input, Skeleton, Select } from "antd";
import { Modal } from "antd";
// import { UploadOutlined } from "@ant-design/icons";
// import axios from "axios";
const { Option } = Select;
const { info } = Modal;
const ProductCreate = (props) => {
    const { name, price, backHref, imgUrl, id, categories } = props;
    const [previewUrl, setPreviewUrl] = useState();
    const [categoryId, setCategoryId] = useState("1");

    return (
        <div>
            <h1>Create Product</h1>
            <a href={backHref}>back</a>

            <div className="select-group">
                <Select
                    defaultValue={categoryId}
                    style={{ width: 120 }}
                    value={categoryId}
                    onChange={(el) => {
                        setCategoryId(el);
                    }}
                >
                    {categories.map((category) => (
                        <Option value={category?.category_id}>
                            {category?.name}
                        </Option>
                    ))}
                </Select>
                <input
                    style={{ display: "none" }}
                    type="text"
                    name="category_id"
                    value={categoryId}
                />
            </div>
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
                        const files = el.target.files;

                        if (files && files[0]) {
                            const reader = new FileReader();
                            reader.onload = (e) => {
                                setPreviewUrl(e.target.result);
                            };
                            reader.readAsDataURL(files[0]);
                        }
                    }}
                />
                {previewUrl ? (
                    <img
                        style={{ width: 400, maxHeight: 300 }}
                        src={previewUrl}
                        alt="image"
                    />
                ) : (
                    <Skeleton.Image style={{ width: 400, height: 300 }} />
                )}
                <div>
                    <button type="submit">submit</button>
                </div>
            </div>
        </div>
    );
};

export default ProductCreate;
