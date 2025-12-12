import '@vitejs/plugin-react/preamble';
import './bootstrap';
import '../css/app.css';

import React from 'react';
import ReactDOM from 'react-dom/client';
import ProductosPage from './components/productsPage';
import { ThemeProvider } from './components/theme-provider';

const rootElement = document.getElementById('app');

if (rootElement) {
    ReactDOM.createRoot(rootElement).render(
        <React.StrictMode>
            <ThemeProvider defaultTheme="light" storageKey="vite-ui-theme">
                <ProductosPage />
            </ThemeProvider>
        </React.StrictMode>
    );
}
