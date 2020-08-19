# Laravel Socialite Test


## principle
one email only can register one platform (checke platform id exist or not to login or register)

------
## Login 


### Before Login 

- [x] general login (if email exist)
- [x] random captcha

*use  3rd party oauth application to get user info *
- [x] github
- [x] google 
- [ ] line

![image](https://github.com/kiddchantw/testSocialite/blob/master/public/loginPage.png?raw=true)


### After Login 

- [x] profile: show user infomation & image
![image](https://github.com/kiddchantw/testSocialite/blob/master/public/profile.png?raw=true)

- [x] upload image :  非第三方登入後，可再上傳圖片

![image](https://github.com/kiddchantw/testSocialite/ blob/master/public/upload.png?raw=true)

---

## Register
- [x] general register
![image](https://github.com/kiddchantw/testSocialite/ blob/master/public/register.png?raw=true)

- [x] mail verification : mailtrap

![image](https://github.com/kiddchantw/testSocialite/ blob/master/public/verify.png?raw=true)




## reference
https://laravel.com/docs/7.x/socialite
https://socialiteproviders.netlify.com/about.html





