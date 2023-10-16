import React from 'react';
import { createRoot } from 'react-dom/client';
import { useState, useEffect } from 'react';
import '../../css/Components/home.css';
import axios from 'axios';
import { Container } from "react-bootstrap"


import { BsFillPinMapFill, BsFillCreditCard2FrontFill } from 'react-icons/bs';
import { IoFastFoodOutline } from 'react-icons/io5';
import { FcAssistant, FcCurrencyExchange, FcAbout, FcTwoSmartphones } from 'react-icons/fc';
import Cookies from 'js-cookie';
import { GiTakeMyMoney } from 'react-icons/gi';
// import { AppContext } from '../AppContext';
import image from '../../../public/images/image/hello.jpg'
import { useContext } from "react";
import { Link } from "react-router-dom";
import Swal from 'sweetalert2';
// import QRCode from "qrcode.react";
export default function Home() {
    const [table, setTable] = useState(null);
    useEffect(() => {
        axios.get('/api/getTable')
            .then((response) => {
                const tableData = response.data.table;
                setTable(tableData);
                const numberTableSpan = document.querySelector('.number_table');
                numberTableSpan.textContent = tableData;
            })
            .catch((error) => {
                console.error('Error fetching data:', error);
            });
    }, []);

    const [selectedOption, setSelectedOption] = useState('');

    const handleOptionChange = (event) => {
        setSelectedOption(event.target.value);
    };
    const [rating, setRating] = useState(null);
    const [hover, setHover] = useState(null);
    // const [review, setReview] = useState('');
    const [selectedReason, setSelectedReason] = useState('');
    const [otherReason, setOtherReason] = useState('');

    const handleRatingClick = (value) => {
        setRating(value);
    };

    const handleMouseEnter = (value) => {
        setHover(value);
    };

    const handleMouseLeave = () => {
        setHover(null);
    };

    // const handleReviewChange = (event) => {
    //     setReview(event.target.value);
    // };

    const handleReasonClick = (reason) => {
        setSelectedReason(reason);
    };

    const handleOtherReasonChange = (event) => {
        setOtherReason(event.target.value);
    };





    const tableNumber = localStorage.getItem("tableNumber");



    const [show, setShow] = useState(false)
    const handle_click = () => {
        setShow(!show)
    }
    const handle_click_close = () => {
        setShow(false)
    }
    const [show2, setShow2] = useState(false)
    const handle_click_2 = () => {
        setShow2(!show2)
    }
    const handle_click_close_2 = () => {
        setShow2(false)
    }

    const [show3, setShow3] = useState(false)
    const handle_click_3 = () => {
        setShow3(!show3)
    }
    const close_3 = () => {
        setShow3(false)
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
    const handleSubmitReview = () => {
        const cookieData = getCookieData();
        // Gửi đánh giá, xếp hạng, lý do không hài lòng và nhận xét lên máy chủ
        const datareview = {
            rating,
            selectedReason,
            otherReason,
            user_name: cookieData.user_name
            // review,
          };

          axios.post('/api/save-review', datareview)
          .then(response => {
            // Xử lý phản hồi từ máy chủ
            // console.log('Phản hồi từ máy chủ:', response.datareview);
            // Hiển thị thông báo cho người dùng
            Swal.fire({
              icon: 'success',
              text: 'Cám ơn bạn đã đánh giá',
              width: '60%',
              height: '150px'
            });
            // setShow3(false)

          })
          .catch(error => {
            // Xử lý lỗi (nếu có)
            console.error('Lỗi khi gửi đánh giá:', error);
          });
    };

    return (
        <div className="page_hone">
            <Container>
                <div className="home_page">
                    <h2 className="company_name">Dream Pos</h2>
                    <p className="address"><BsFillPinMapFill />  <span>Số 1500 Huỳnh Tấn Phát, Q7</span></p>
                    <div className="company_img"><img src={image} /></div>
                    {/* <div className="company_img">
                        <img src='https://phutungnhapkhauchinhhang.com/wp-content/uploads/2020/06/default-thumbnail.jpg'
                             />
                    </div> */}
                    <h4 className="home_page_hello">Chào bạn: {Cookies.get('user_name')}</h4>

                    <div className="home_page_table">
                        <p>
                            Bạn đang ngồi bàn:
                        </p>
                        <span className="number_table"></span>
                    </div>

                    <div className="button_call">
                        <div className="call_bill" onClick={handle_click}>
                            <FcCurrencyExchange className="call_icon" />
                            <p>Gọi thanh toán</p>
                        </div>



                        <div className="call" onClick={handle_click_2}>
                            <FcAssistant className="call_icon" />
                            <p>Gọi nhân viên</p>
                        </div>
                        <div className="call_comment" onClick={handle_click_3}>
                            <FcAbout className="call_icon" />
                            <p>Đánh giá</p>
                        </div>
                    </div>
                    <Link to={"/menu"} className="view_menu">
                        <IoFastFoodOutline className="view_menu_icon" />
                        <p>Xem menu - gọi món</p>
                    </Link>
                </div>
            </Container>
            <div className={`menu_thanh_toan ${show ? "activemenu_thanh_toan" : ""}`}>
                <div className="close_menu_thanh_toan" onClick={handle_click_close}>
                </div>
                <div className="menu_thanh_toan_content">
                    <Container>
                        <h3>Gọi thanh toán</h3>
                        <p>Bạn muốn thanh toán bằng?</p>
                        <div>
                            <div className="thanhtoan_button">

                                <label htmlFor="thanhtoan1"><GiTakeMyMoney className="thanhtoan_icon" /> Thanh toán bằng tiền mặt</label>
                                <input
                                    type="radio"
                                    id="thanhtoan1"
                                    name="fav_language"
                                    value="HTML"
                                    checked={selectedOption === 'HTML'}
                                    onChange={handleOptionChange}
                                />


                            </div>
                            <div className="thanhtoan_button">
                                <label htmlFor="thanhtoan2"><BsFillCreditCard2FrontFill className="thanhtoan_icon" />Thanh toán bằng thẻ</label>
                                <input
                                    type="radio"
                                    id="thanhtoan2"
                                    name="fav_language"
                                    value="CSS"
                                    checked={selectedOption === 'CSS'}
                                    onChange={handleOptionChange}
                                />


                            </div>
                            <div className="thanhtoan_button">
                                <label htmlFor="thanhtoan3"><FcTwoSmartphones className="thanhtoan_icon" />Ứng dụng điện thoại</label>
                                <input
                                    type="radio"
                                    id="thanhtoan3"
                                    name="fav_language"
                                    value="JavaScript"
                                    checked={selectedOption === 'JavaScript'}
                                    onChange={handleOptionChange}
                                />

                            </div>

                        </div>
                        <div>
                            <button className="gui_y_cau">Gửi yêu cầu</button>
                        </div>
                    </Container>
                </div>


            </div>
            <div className={`menu_goi_nhanvien ${show2 ? "activemenu_goi_nhanvien" : ""}`}>
                <div className="close_menu_goi_nhanvien" onClick={handle_click_close_2}></div>
                <div>

                    <div className="menu_goi_nhanvien_content">
                        <Container>
                            <h3>Gọi nhân viên</h3>
                            <p>Bạn muốn gọi nhân viên làm gì?</p>
                            <input placeholder="Lấy muỗn đũa, lấy thêm ly,..."></input>
                            <div>
                                <button className="gui_y_cau">Gửi yêu cầu</button>
                            </div>
                        </Container>
                    </div>

                </div>
            </div>
            <div className={`menu_danh_gia ${show3 ? "activemenu_danh_gia" : ""}`}>
                <div className="close_menu_danh_gia" onClick={close_3}></div>
                <div className="menu_danh_gia_content">
                    <Container>
                        <h3>Trải nghiệm hôm nay của bạn như thế nào</h3>
                        <div>
                            {[...Array(5)].map((_, index) => {
                                const starValue = index + 1;
                                return (
                                    <label
                                        key={index}
                                        onMouseEnter={() => handleMouseEnter(starValue)}
                                        onMouseLeave={handleMouseLeave}
                                        onClick={() => handleRatingClick(starValue)}
                                    >
                                        <input
                                            type="radio"
                                            name="rating"
                                            value={starValue}
                                            style={{ display: 'none' }}
                                        />
                                        <span
                                            className={starValue <= (hover || rating) ? 'star filled' : 'star'}
                                            style={{ color: starValue <= (hover || rating) ? 'yellow' : 'gray' }}
                                        >
                                            &#9733;
                                        </span>
                                    </label>
                                );
                            })}
                        </div>
                        <p className="banchuahailong">Bạn có điều gì chưa hài lòng phải không?</p>
                        <div className="danhgia_mau">
                            <p
                                onClick={() => handleReasonClick('Vệ sinh không sạch sẽ')}
                                className={selectedReason === 'Vệ sinh không sạch sẽ' ? 'selected-reason' : ''}
                            >
                                Vệ sinh không sạch sẽ
                            </p>
                            <p
                                onClick={() => handleReasonClick('Nhân viên không nhiệt tình')}
                                className={selectedReason === 'Nhân viên không nhiệt tình' ? 'selected-reason' : ''}
                            >
                                Nhân viên không nhiệt tình
                            </p>
                            <p
                                onClick={() => handleReasonClick('Món ăn không ngon')}
                                className={selectedReason === 'Món ăn không ngon' ? 'selected-reason' : ''}
                            >
                                Món ăn không ngon
                            </p>
                            <input
                                placeholder="Lý do khác"
                                className="button_ly_do_khac"
                                // value={selectedReason === 'Khác' ? otherReason : ''}
                                onChange={handleOtherReasonChange}
                            />
                        </div>
                    </Container>
                    <div className="gui_danh_gia_container">
                        <Container>
                            <p>Nhà hàng rất trân trọng và mong muốn phản hồi lại đánh giá trên, bạn vui lòng để lại số điện thoại nhé</p>
                            <div className="gui_danh_gia_container_gui">
                                <button onClick={handleSubmitReview} className="gui_danh_gia_container_gui_button">
                                    Gửi đánh giá
                                </button>
                            </div>
                        </Container>
                    </div>
                </div>
            </div>
        </div>
    )
}
// const rootElement = document.getElementById('home')
// const root = createRoot(rootElement);
// root.render(<Home />);
