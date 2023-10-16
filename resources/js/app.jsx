import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import React from 'react';

import { BrowserRouter as Router, Route, BrowserRouter, Link, Routes } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';
import { createRoot } from 'react-dom/client';

import Home from './Components/Home';
import Open_page from './Components/OpenPage';
import Menu from './Components/Menu';
import Pos from './Components/Pos/pos';

function App() {
    return (
        <BrowserRouter>
            <Routes>
                    <Route path="/" element={<Open_page />}/>
                    <Route path="/home" element={<Home />}/>
                    <Route path="/menu" element={<Menu />}/>
                    <Route path="/pos" element={<Pos />}/>
            </Routes>
        </BrowserRouter>
    );
}
export default App;
const rootElement = document.getElementById('app')
const root = createRoot(rootElement);
root.render(<App />);
