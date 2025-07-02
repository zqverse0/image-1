/*
 * @Author: mulingyuer
 * @Date: 2023-05-20 13:24:44
 * @LastEditTime: 2023-05-20 13:28:03
 * @LastEditors: mulingyuer
 * @Description: 全局错误捕获
 * @FilePath: \Typecho_Theme_JJ\static\scripts\globalError.js
 * 怎么可能会有bug！！！
 */

window.$globalError = {
	/** 错误记录数据数组 */
	list: [],
	/** 错误记录处理回调 */
	callback: null
};

window.addEventListener(
	"error",
	function (event) {
		if (typeof window.$globalError.callback === "function") {
			window.$globalError.callback(event);
		} else {
			window.$globalError.list.push(event);
		}
	},
	true
);

// 恢复为无注册弹窗、验证码、注册表单相关 JS

(function() {
	var loginForm = document.getElementById('login-form');
	var registerForm = document.getElementById('register-form');
	var registerBtn = document.querySelector('.login-dialog-register-btn');
	var backBtn = document.querySelector('.login-dialog-back-btn');
	var captchaImg = document.getElementById('register-captcha-img');
	if (registerBtn && loginForm && registerForm) {
		registerBtn.addEventListener('click', function() {
			loginForm.style.display = 'none';
			registerForm.style.display = 'block';
		});
	}
	if (backBtn && loginForm && registerForm) {
		backBtn.addEventListener('click', function() {
			registerForm.style.display = 'none';
			loginForm.style.display = 'block';
		});
	}
	if (captchaImg) {
		captchaImg.addEventListener('click', function() {
			this.src = '/usr/themes/Typecho_Theme_JJ/register_captcha.php?' + Math.random();
		});
	}
	if (registerForm) {
		registerForm.addEventListener('submit', function(e) {
			var pwd = registerForm.querySelector('input[name="password"]').value;
			var pwd2 = registerForm.querySelector('input[name="password2"]').value;
			if (pwd !== pwd2) {
				alert('两次输入的密码不一致');
				e.preventDefault();
				return false;
			}
			// 可选：前端邮箱、用户名等格式校验
		});
	}
})();
