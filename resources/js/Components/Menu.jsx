import React from 'react';
import { Container } from "react-bootstrap";
import '../../css/Components/Menu.css';
import { Link } from "react-router-dom";
import { Row } from "react-bootstrap";
import { Col } from "react-bootstrap";
import { useState, useEffect } from 'react';
import { FcHome } from 'react-icons/fc';

import { MdArrowBackIosNew } from 'react-icons/md';
import { useContext } from "react";
import { IoCartOutline } from "react-icons/io5";
import { AiOutlinePlusCircle, AiFillDelete } from "react-icons/ai";
import axios from 'axios';
import Swal from 'sweetalert2';
import { MdMenuBook } from "react-icons/md";
export default function Menu() {
    const [data, setData] = useState({ product_categories: [], products: [], total_items: 0, cart: [], total_price: 0 });
    const [allProduct, setAllProduct] = useState([]);
    useEffect(() => {
        setActiveButtonId('All');
        axios.get('/api/menu')
            .then((response) => {
                setData(response.data);
                const total_items = response.data.total_items;
                const cart = response.data.cart;
                const products = response.data.products;
                setAllProduct(products);
            })
            .catch((error) => {
                console.error('Error fetching data:', error);
            });
    }, []);
    const [activeButtonId, setActiveButtonId] = useState(null);
    const filterProducts = async (product_category_id) => {
        if (product_category_id === 'All') {
            // Nếu product_category_id là 'all', sử dụng danh sách tất cả sản phẩm
            setData((prevData) => ({
                ...prevData,
                products: allProduct,
            }));
        }
        else {
            try {
                const response = await axios.get(`/api/product/filterProducts/${product_category_id}`);
                const products = response.data.products;
                setData((prevData) => ({
                    ...prevData,
                    products: products,
                }));
                setActiveButtonId(product_category_id);


            } catch (error) {
                console.error('Error fetching data:', error);
            }
        }
    };
    const handleAddToCart = async (productId) => {
        try {
            const response = await axios.get(`/api/product/add-to-cart/${productId}`);
            const total_items = response.data.total_items;
            const cart = response.data.cart;
            const total_price = response.data.total_price;
            setData((prevData) => ({
                ...prevData,
                total_items: total_items,
                cart: cart,
                total_price: total_price,
            }));
            Swal.fire({
                icon: 'success',
                text: response.data.message,
                width: '60%',
                height: '150px'

            });
        } catch (error) {
            console.error('Error adding to cart:', error);
        }
    };

    const [showcart, setShowcart] = useState(false)
    const handle_click_showcart = () => {
        setShowcart(!showcart)
    }
    const close_cart = () => {
        setShowcart(false)
    }
    const delete1 = async (productId) => {

        try {
            const response = await axios.get(`/api/product/delete-to-cart/${productId}`);
            const total_items = response.data.total_items;
            const cart = response.data.cart;
            const total_price = response.data.total_price;
            setData((prevData) => ({
                ...prevData,
                total_items: total_items,
                total_price: total_price,
                cart: cart,
            }));
            Swal.fire({
                icon: 'success',
                text: response.data.message,
                width: '60%',
                height: '150px'
            });
        } catch (error) {
            console.error('Error delete to cart:', error);
        }
    }
    const changqty = async (productId, num) => {
        try {
            const response = await axios.get(`/api/product/updateItem-to-cart/${productId}/${num}`);
            const total_items = response.data.total_items;
            const cart = response.data.cart;
            const total_price = response.data.total_price;
            setData((prevData) => ({
                ...prevData,
                total_items: total_items,
                total_price: total_price,
                cart: cart,
            }));
            // Swal.fire({
            //     icon: 'success',
            //     text: response.data.message,
            //     width: '60%',
            //     height: '150px'
            // });
        } catch (error) {
            console.error('Error delete to cart:', error);
        }

    };

    const emtyCart = async () => {
        try {
            const response = await axios.get(`/api/product/delete-to-cart`);
            const total_items = response.data.total_items;
            const cart = response.data.cart;
            const total_price = response.data.total_price;
            setData((prevData) => ({
                ...prevData,
                total_items: total_items,
                total_price: total_price,
                cart: cart,
                setShowcart: false,
            }));
            Swal.fire({
                icon: 'success',
                text: response.data.message,
                width: '60%',
                height: '150px'
            });
        } catch (error) {
            console.error('Error delete to cart:', error);
        }
    }
    function getCookie(name) {
        const cookies = document.cookie.split('; ');
        for (const cookie of cookies) {
            const [cookieName, cookieValue] = cookie.split('=');
            if (cookieName === name) {
                return decodeURIComponent(cookieValue);
            }
        }
        return null; // Trả về null nếu không tìm thấy cookie
    }

    const getCookieData = () => {
        return {
            user_name: getCookie('user_name')
        };
    };

    const place_order = async () => {
        try {
            const cookieData = getCookieData();
            const response = await axios.post('api/placeorderclient', cookieData);
            const cart = response.data.cart;
            setData((prevData) => ({
                ...prevData,
                total_items: 0,
                total_price: 0,
                cart: cart,
                setShowcart: false,
            }));
            Swal.fire({
                icon: 'success',
                text: response.data.message,
                width: '60%',
                height: '150px'
            });
        } catch (error) {
            console.error('Error delete to cart:', error);
        }
    }


    return (
        <div className="menu">
            <Container>
                <div className="menu_page">
                    <div className="menu_page_top">
                        <Link to={"/home"}><FcHome /></Link>
                        <input placeholder="Bạn muốn tìm gì?"></input>
                        <div className="gio_hang" onClick={handle_click_showcart}><IoCartOutline />
                            <div className="item_quality">{data.total_items}</div>
                        </div>
                    </div>
                    <div className="danh_muc">
                        <button
                            className={activeButtonId === 'All' ? 'active-button' : ''}
                            onClick={() => {
                                setActiveButtonId('All');
                                filterProducts('All');
                            }}
                            key="All">
                            All
                        </button>
                        {data.product_categories.map((product_category) => (
                            // <button key={product_category.id}>{product_category.name}</button>
                            <button
                                className={activeButtonId === product_category.id ? 'active-button' : ''}
                                onClick={() => filterProducts(product_category.id)}
                                key={product_category.id}>
                                {product_category.name}
                            </button>
                        ))}
                    </div>
                    <div className="product">
                        <Row>
                            {data.products.map((product) => (
                                <Col xs={6} sm={6} lg={3} md={6} key={product.id}>
                                    <div className="con_product">
                                        <div className="ing_product">
                                            <img src={(product && product.image)
                                                ? `${data.url}/${product.image}`
                                                : 'https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg'}
                                                alt={product.name} />
                                        </div>
                                        <div className="con_product_bottom">
                                            <div className="con_product_title">
                                                <h6>{product ? product.name : ""}</h6>
                                                {/* <Link to={`/san-pham/${product.id}`} className="product_name"><b><h5>{product ? product.name : ""}</h5></b></Link> */}
                                                <div className="product_price">
                                                    <div>
                                                        <span>Giá: </span>{product ? product.price.toLocaleString('vi-VN') : ""} <span>đ</span>
                                                    </div>
                                                    <div className="add_cart" >
                                                        <button
                                                            className="add-to-cart"
                                                            onClick={() => handleAddToCart(product.id)}
                                                        >
                                                            <AiOutlinePlusCircle />
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </Col>
                            ))}
                        </Row>
                    </div>
                </div>
            </Container>
            <div className={`cart_page ${showcart ? "activecart_page" : ""}`}>
                <Container>
                    <div className="container_cart">
                        <div className="cart_col">
                            <button className="back_menu_top" onClick={close_cart}><MdArrowBackIosNew /></button>
                            <h5>Các món đã chọn</h5>
                            <button className="back_menu_top" onClick={() => emtyCart()}><AiFillDelete /></button>
                        </div>
                        <div className='cart_product'>

                            {data.cart && Object.keys(data.cart).map((productId) => (
                                <div key={productId} className="container_card">
                                    <div className="cart_img" >
                                        <img src={data.cart[productId].image} />
                                    </div>
                                    <div className='cart_content'>
                                        <h6 className="cart_name">{data.cart[productId].name}</h6>
                                        <p className="cart_quality">
                                            <samp className="changqty" type="button" onClick={() => (changqty(productId, -1))}>-</samp>
                                            {data.cart[productId].qty}
                                            <span className="changqty" type="button" onClick={() => (changqty(productId, 1))}>+</span>
                                            <div className="cart_delete" type="button" onClick={() => (delete1(productId))}><AiFillDelete /></div>
                                        </p>
                                        <p className="cart_price">Đơn giá: {data.cart[productId].price.toLocaleString('vi-VN')} đ</p>
                                        <p className="cart_total">Tổng tiền: {(data.cart[productId].qty * data.cart[productId].price).toLocaleString('vi-VN')} đ</p>

                                    </div>
                                </div>
                            ))}
                        </div>
                        <div className='cont_emtycart'>
                            {/* <div className="emtycart" type="button" onClick={() => emtyCart()}>Xoá tất cả<AiFillDelete /></div> */}
                        </div>

                        <div className="card mb-3 mt-3">
                            <div className="card-body">
                                <span className="lead fw-normal">
                                    Tổng cộng: {data.total_price.toLocaleString('vi-VN')} đ
                                </span>
                            </div>
                        </div>
                        <div className="cart_button">
                            {/* <button className="cart_back_menu" onClick={close_cart}>Tiếp tục order</button> */}
                            <button className="cart_gui_y_cau" onClick={() => place_order()}>Gửi yêu cầu</button>
                        </div>
                        {/* </div> */}
                    </div>
                </Container>

            </div>

        </div>
    )
}
