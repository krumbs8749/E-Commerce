export default{
    props: ['token'],
    template:`
<div class="login-area">
    <div class="login-container">
        <h2>Login</h2>
        <form action="/login" method="post">
            <input type="hidden" name="_token" :value="this.token"/>
            <input type="text" name="username" placeholder="Username" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
            <p class="error"></p>
        </form>
    </div>
</div>`
}
