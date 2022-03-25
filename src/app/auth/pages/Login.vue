<template>
    <div>
        <div class="grid grid-cols-2 bg-light rounded-lg mb-9">
            <router-link class="flex p-4 gap-3 justify-center font-medium items-center bg-primary-default rounded-lg text-white " to="/login">

                <i class="dr dr-security-safe"></i>
                ورود
            </router-link>
            <router-link class="flex gap-3 justify-center font-medium items-center rounded-lg" to="/register">
                <i class="dr dr-user"></i>
                ثبت نام
            </router-link>
        </div>
        <h2 class="font-head text-xl font-bold text-center mb-4">سلام رفیق!</h2>
        <p class="text-center text-sm text-gray-700">به خونه خوش اومدی! اگه عضو دراگون هستی وارد شو</p>
        <div class="grid sm:grid-cols-2 grid-cols-1 gap-4 my-6">
            <button class="bg-white flex gap-2 border border-transparent  hover:text-gray-900 rounded-lg shadow-sm h-14 px-4 flex items-center sm:justify-start justify-center hover:bg-primary-700 group hover:bg-opacity-20 transition duration-200">
                <svg width="24" height="26" viewBox="0 0 24 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_59_2134)">
                        <path d="M23.9996 12.8894C23.9996 12.0329 23.9321 11.1717 23.7881 10.3291H12.2402V15.1811H18.8532C18.5788 16.746 17.697 18.1303 16.4059 19.01V22.1582H20.3512C22.668 19.9637 23.9996 16.7228 23.9996 12.8894Z" fill="#4285F4"/>
                        <path d="M12.2404 25.2C15.5423 25.2 18.327 24.0842 20.3558 22.1582L16.4106 19.01C15.3129 19.7785 13.8959 20.2137 12.2449 20.2137C9.05088 20.2137 6.34272 17.996 5.37103 15.0144H1.2998V18.2599C3.37815 22.5147 7.61133 25.2 12.2404 25.2Z" fill="#34A853"/>
                        <path d="M5.36712 15.0144C4.85428 13.4496 4.85428 11.7551 5.36712 10.1902V6.9447H1.30039C-0.436068 10.505 -0.436068 14.6996 1.30039 18.2599L5.36712 15.0144Z" fill="#FBBC04"/>
                        <path d="M12.2404 4.9863C13.9858 4.95852 15.6728 5.63447 16.9369 6.87525L20.4323 3.2779C18.219 1.13893 15.2814 -0.0370381 12.2404 3.29281e-07C7.61133 3.29281e-07 3.37815 2.68528 1.2998 6.9447L5.36653 10.1902C6.33373 7.20397 9.04638 4.9863 12.2404 4.9863Z" fill="#EA4335"/>
                    </g>
                    <defs>
                        <clipPath id="clip0_59_2134">
                            <rect width="24" height="25.2" fill="white"/>
                        </clipPath>
                    </defs>
                </svg>
                ورود با گوگل
            </button>
            <button class="bg-white flex gap-2 border border-transparent  hover:text-gray-900 rounded-lg shadow-sm h-14 px-4 flex items-center sm:justify-start justify-center hover:bg-primary-700 group hover:bg-opacity-20 transition duration-200">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.8986 0.219727C5.33541 0.219727 0.0195312 5.5356 0.0195312 12.0988C0.0195312 17.3553 3.41991 21.7951 8.14183 23.369C8.73579 23.473 8.95852 23.1166 8.95852 22.8048C8.95852 22.5226 8.94367 21.5872 8.94367 20.5923C5.95906 21.1417 5.18692 19.8647 4.94934 19.1965C4.8157 18.855 4.2366 17.8007 3.73174 17.5186C3.31597 17.2959 2.72202 16.7465 3.71689 16.7316C4.65236 16.7168 5.32056 17.5928 5.54329 17.9492C6.61241 19.7459 8.32002 19.2411 9.00307 18.9292C9.10701 18.1571 9.41883 17.6374 9.76035 17.3404C7.11727 17.0434 4.35539 16.0189 4.35539 11.4751C4.35539 10.1833 4.8157 9.11417 5.57299 8.28263C5.4542 7.98566 5.03843 6.76805 5.69178 5.13469C5.69178 5.13469 6.68665 4.82286 8.95852 6.35229C9.90884 6.08501 10.9186 5.95137 11.9283 5.95137C12.938 5.95137 13.9477 6.08501 14.898 6.35229C17.1699 4.80801 18.1648 5.13469 18.1648 5.13469C18.8181 6.76805 18.4024 7.98566 18.2836 8.28263C19.0409 9.11417 19.5012 10.1684 19.5012 11.4751C19.5012 16.0337 16.7244 17.0434 14.0814 17.3404C14.512 17.7116 14.8832 18.4244 14.8832 19.538C14.8832 21.1269 14.8683 22.4039 14.8683 22.8048C14.8683 23.1166 15.0911 23.4878 15.685 23.369C20.3773 21.7951 23.7776 17.3404 23.7776 12.0988C23.7776 5.5356 18.4618 0.219727 11.8986 0.219727Z" fill="black"/>
                </svg>
                ورود با گیت هاب
            </button>
            <button class="bg-white flex gap-2 border border-transparent  hover:text-gray-900 rounded-lg shadow-sm h-14 px-4 flex items-center sm:justify-start justify-center hover:bg-primary-700 group hover:bg-opacity-20 transition duration-200">
                <svg width="25" height="22" viewBox="0 0 25 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0.885742 5.61426H5.41223L8.04795 12.3575L10.7179 5.61426H15.1252L8.48878 21.5777H4.05357L5.87017 17.3476L0.885742 5.61426Z" fill="#5F01D1"/>
                    <path d="M16.6356 17.4943C18.15 17.4943 19.3776 16.2667 19.3776 14.7523C19.3776 13.2379 18.15 12.0103 16.6356 12.0103C15.1212 12.0103 13.8936 13.2379 13.8936 14.7523C13.8936 16.2667 15.1212 17.4943 16.6356 17.4943Z" fill="#5F01D1"/>
                    <path d="M20.2792 11.0028H15.3428L19.7239 0.478027H24.6418L20.2792 11.0028Z" fill="#5F01D1"/>
                </svg>

                ورود با یاهو
            </button>
            <button class="bg-white flex gap-2 border border-transparent  hover:text-gray-900 rounded-lg shadow-sm h-14 px-4 flex items-center sm:justify-start justify-center hover:bg-primary-700 group hover:bg-opacity-20 transition duration-200">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.4495 20.4494H16.8934V14.88C16.8934 13.5518 16.8696 11.8422 15.0439 11.8422C13.1917 11.8422 12.9082 13.2892 12.9082 14.7832V20.449H9.35222V8.99594H12.766V10.5611H12.8139C13.509 9.37255 14.8062 8.66002 16.1822 8.71112C19.7864 8.71112 20.4511 11.082 20.4511 14.1665L20.4495 20.4494ZM5.33974 7.43035C4.20764 7.43035 3.27564 6.49881 3.27564 5.36662C3.27564 4.23443 4.20721 3.30279 5.33931 3.30279C6.47131 3.30279 7.40277 4.23422 7.40298 5.36619C7.40298 6.49817 6.47163 7.43025 5.33974 7.43035ZM7.11775 20.4494H3.55796V8.99594H7.11775V20.4494ZM22.2223 0.000152324H1.77093C0.810914 -0.0106903 0.0117011 0.770007 0 1.73011V22.268C0.0112717 23.2286 0.810377 24.0102 1.77093 23.9999H22.2223C23.1851 24.012 23.9871 23.2305 24 22.268V1.72871C23.9871 0.766576 23.1841 -0.0125155 22.2223 0.000152324Z" fill="#3B82F6"/>
                </svg>
                ورود با لینکدین
            </button>
        </div>
        <div class="relative flex py-5 items-center">
            <div class="flex-grow border-t border-gray-300"></div>
            <span class="flex-shrink mx-4 text-gray-600 text-sm">یا ورود به حساب با </span>
            <div class="flex-grow border-t border-gray-300"></div>
        </div>
        <form ref="form" @submit.prevent="login">
            <div class="flex flex-col gap-y-3 mb-6">
                <label class="font-semibold text-sm text-gray-800 pr-1" for="email">ایمیل</label>
                <input id="email" class="bg-light h-14 rounded-lg p-2 text-sm font-semibold text-dark-default border-2 border-transparent transition duration-200" type="text" name="user_name" tabindex="0" placeholder="ایمیل یا نام کاربری خود را وارد کنید">
            </div>

            <div class="flex flex-row flex-wrap gap-y-3 mb-6">
                <label class="flex-auto font-semibold text-sm text-gray-800 pr-1" for="password">رمز عبور</label>
                <router-link class="flex-shrink" to="/forget">فراموشی رمز عبور</router-link>
                <div class="w-full relative">
                    <input id="password" class="bg-light w-full h-14 rounded-lg p-2 text-sm font-semibold text-dark-default border-2 border-transparent transition duration-200"
                            autocomplete="new-password"
                           :type="showPass ? 'text' : 'password'" name="password" tabindex="1"  placeholder="رمز عبور خود را وارد کنید">
                    <button class="absolute left-4 top-1/2 transform -translate-y-1/2" @click="showPass = !showPass" type="button">
                        <i v-if="showPass" class="dr dr-eye-slash"></i>
                        <i v-else class="dr dr-eye"></i>
                    </button>
                </div>
            </div>

            <button class="flex justify-center gap-4 items-center w-full h-14 rounded-lg text-white"
                    :class="{
                        'bg-primary-700' : progress,
                        'bg-primary-default' : !progress,
                    }"
                    :disabled="progress"
                    type="submit">

                <i v-if="progress" class="dr dr-radar animate-spin"></i>
                <i v-else class="dr dr-security-safe"></i>
                ورود
            </button>
        </form>
    </div>
</template>

<script>
export default {
    name: "Login",
    data() {
        return {
            showPass: false
        }
    },
    methods: {
        login: function (e) {
            this.progress= true;
            this.$request.post('auth/login', this.utils.getFormData(e.target))
                .then(res => {
                    console.log(res)
                    this.$toasts.success(res.data.message)
                })
                .catch((err) => {
                    if (err.response){
                        this.$toasts.error(err.response.data.message)
                    }

                })
                .then(() => {
                    this.progress = false
                })

        }
    }
}
</script>

<style scoped>

</style>
