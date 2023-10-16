import React from 'react';
import { createRoot } from 'react-dom/client';
import { useState, useEffect } from 'react';
import '../../css/Components/OpenPage.css';
import axios from 'axios';
import { Link } from "react-router-dom";
import { Container } from "react-bootstrap"
import Cookies from 'js-cookie';
// import hello from "../../imgs/hello.jpg"
import image from '../../../public/images/image/hello.jpg'
function OpenPage() {
    const [name, setName] = useState('');

    const handleNameChange = (e) => {
        setName(e.target.value);
    };

    const handleStartClick = () => {
        if (name.trim() === '') {
            // Hiển thị thông báo yêu cầu nhập tên
            alert('Vui lòng nhập tên của bạn');
          } else {
            // Nếu có tên, chuyển hướng đến trang "/home"
            Cookies.set('user_name', name);
            window.location.href = '/home';
        }
        // Lưu giá trị của ô input vào cookie với tên là 'user_name'
        // Cookies.set('user_name', name, 86400);
        // Chuyển hướng đến trang "/home"
        // (Bạn cần thêm React Router để sử dụng Link)
        // this.props.history.push('/home');
    };
    return (
        <div className="open">
            <Container>
                <div className="container_open">
                    <div>
                        <form>
                        <img src={image}
                             />
                            <h2>DREAMPOS XIN CHÀO BẠN</h2>
                            <p>Mời bạn nhập tên để nhà hàng phục vụ bạn nhanh chóng và chính xác hơn</p>
                            <div className="your_name">
                                <input placeholder="Mời bạn nhập tên" value={name} className="input_your_name" onChange={handleNameChange}></input>
                            </div>
                            <Link>
                                <button type='submit' className="button_start" onClick={handleStartClick}>Bắt đầu</button>
                            </Link>
                        </form>

                    </div>
                    <p className="powered_by">Powered by Dreampos</p>
                </div>
            </Container>
        </div>
    );
}
export default OpenPage;
// const rootElement = document.getElementById('openpage')
// const root = createRoot(rootElement);
// root.render(<OpenPage />);
