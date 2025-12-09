import './bootstrap';
import '../css/app.css';


import React from 'react';
import ReactDOM from 'react-dom/client';
import Page from './components/Page';
import { ThemeProvider } from './components/theme-provider';

const rootElement = document.getElementById('app');

if (rootElement) {
    ReactDOM.createRoot(rootElement).render(
        <React.StrictMode>
            <ThemeProvider defaultTheme="light" storageKey="vite-ui-theme">
                <Page />
            </ThemeProvider>
        </React.StrictMode>
    );
}
