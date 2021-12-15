import React, { useEffect, useState } from "react";
import Cookies from "js-cookie";
import { Input, Upload, Button, Skeleton, message } from "antd";
import { Modal } from "antd";
import { UploadOutlined } from "@ant-design/icons";
import axios from "axios";

const { info } = Modal;
const ProductEditor = (props) => {
    const { name, price, backHref, imgUrl, err } = props;
    const [previewUrl, setPreviewUrl] = useState(imgUrl);
    useEffect(() => {
        if (err.length > 0) {
            err.forEach((e) => {
                message.error(e);
            });
        }
    }, []);
    return (
        <div>
            <h1>Edit Product</h1>
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
                {/* <div>
                    <Button type="submit">submit</Button>
                </div> */}
                <button type="submit">Submit</button>
            </div>
        </div>
    );
};

export default ProductEditor;
