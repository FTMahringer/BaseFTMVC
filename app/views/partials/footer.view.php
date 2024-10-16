<footer>
    <p>&copy; 2024 My MVC App. All rights reserved.</p>

    <div class="footer-main">
        <div class="footer-vertical ">
        </div>

        <div class="footer-vertical ">
        </div>

        <div class="footer-vertical ">
            <a href="https://www.facebook.com"><img src="assets/images/facebook.svg" alt="Facebook"></a>
            <a href="https://www.twitter.com"><img src="assets/images/twitter.svg" alt="Twitter"></a>
            <a href="https://www.instagram.com"><img src="assets/images/instagram.svg" alt="Instagram"></a>
        </div>
    </div>
</footer>

<style>
    footer {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 1rem;
        margin-top: 2rem;
        /* Stick the footer to the bottom if there's not enough content */
        position: relative;
        width: 100%;
    }

    .footer-main {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .footer-vertical {
        display: flex;
        flex-direction: column;
    }

    .footer-vertical a {
        color: white;
        text-decoration: none;
        margin-bottom: 1rem;
    }
</style>