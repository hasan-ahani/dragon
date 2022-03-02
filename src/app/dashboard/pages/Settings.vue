<template>
	<div class="flex gap-4">
		<div class="w-56">
			<ul class="flex flex-col gap-3">
                <li v-for="(menu, i) in options" :key="i" class="bg-white rounded-lg border">
                    <a v-if="menu.submenu" class="flex items-center gap-3 p-3 cursor-pointer">
                        <span class="flex p-3 bg-gray-900 text-white  rounded-lg">
                            <i class="dr" :class="'dr-' + menu.icon"></i>
                        </span>
                        <span class="text-lg font-medium flex-1">{{menu.title}}</span>
                        <i class="dr dr-arrow-left-2"></i>
                    </a>
                    <router-link v-else class="flex items-center gap-3 p-3" to="/">
                        <span class="flex p-3 bg-gray-900 text-white  rounded-lg">
                            <i class="dr dr-home"></i>
                        </span>
                        <span class="text-lg font-medium flex-1">عمومی</span>
                    </router-link>
                </li>
			</ul>
		</div>
        <div class="flex-1">
            <form-schema ref="form" :schema="schema" v-model="model">

            </form-schema>
        </div>
	</div>
</template>

<script>
import FormSchema from './../../components/module/formSchema.vue'
export default {
	name: "Settings",
    components : {
        FormSchema
    },
    data() {
        return {
            schema: require('./../form.json'),
            model: {},
            currentMenu: '',
            options: [
                {
                    name: 'public',
                    title: 'تنظیمات عمومی',
                    icon: 'home'
                },
                {
                    name: 'user',
                    title: 'کاربر',
                    icon: 'user',
                    sections: [
                        { 
                            name: 'auth',
                            title: 'احراز هویت',
                            fields: [
                                {
                                    name: 'test',
                                    type: 'text',
                                }

                            ]
                        }
                    ]
                }
            ]
        }
    }
};
</script>

<style>
</style>