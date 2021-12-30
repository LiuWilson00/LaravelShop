import React, { useState } from "react";
import { Input, Card, Select } from "antd";
import "./style.scss";
import { Modal } from "antd";

const RegisterMember = (props) => {
    const { email, backHref } = props;
    const [formEmail, setFormEmail] = useState("");
    const [formPassword, setFormPassword] = useState("");
    const [formConfirmPassword, setFormConfirmPassword] = useState("");

    return (
        <div className="register">
            <a href={backHref}>back</a>
            <input
                className="hidden"
                type="text"
                value={formEmail}
                name="email"
            />
            <input
                className="hidden"
                type="text"
                value={formPassword}
                name="password"
            />
            <input
                className="hidden"
                type="text"
                value={formConfirmPassword}
                name="confirm_password"
            />
            <Card title={<h2>Register</h2>}>
                <div className="register-input-group">
                    <p className="register-input-label">Email</p>
                    <Input
                        type="text"
                        name="email"
                        defaultValue={email}
                        onChange={(el) => {
                            setFormEmail(el.target.value);
                        }}
                        placeholder="plese enter email"
                    />
                </div>

                <div className="register-input-group">
                    <p className="register-input-label">Password</p>
                    <Input.Password
                        type="text"
                        name="password"
                        onChange={(el) => {
                            setFormPassword(el.target.value);
                        }}
                        placeholder="plese enter product price"
                    />
                </div>
                <div className="register-input-group">
                    <p className="register-input-label">Password Confirm</p>
                    <Input.Password
                        type="text"
                        name="confirm_paaword"
                        onChange={(el) => {
                            setFormConfirmPassword(el.target.value);
                        }}
                        placeholder="confirm password"
                    />
                </div>
                <div>
                    <button type="submit">submit</button>
                </div>
            </Card>
        </div>
    );
};

export default RegisterMember;
