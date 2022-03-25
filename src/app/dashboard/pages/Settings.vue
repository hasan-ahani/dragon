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

            <form class="bg-white rounded-lg py-6">
                <vue-form-generator :schema="schema" :model="model" :options="formOptions">
                </vue-form-generator>
                <button type="submit">submit</button>
            </form>
        </div>
	</div>
</template>

<script>
export default {
	name: "Settings",
    components : {
    },
    data() {
        return {
            model: {
                id: 1,
                name: 'John Doe',
                skills: ['Javascript', 'VueJS'],
                email: 'john.doe@gmail.com',
                status: true
            },

            schema: {
                groups: [
                    {
                        legend: 'User Details',
                        fields: [
                            {
                                type: 'input',
                                inputType: 'text',
                                label: 'ID (disabled text field)',
                                model: 'id',
                                readonly: true,
                                disabled: true
                            },
                            {
                                type: 'input',
                                inputType: 'text',
                                label: 'Name',
                                model: 'name',
                                id: 'user_name',
                                placeholder: 'Your name',
                                featured: true,
                                required: true
                            },
                            {
                                type: "switch",
                                label: "Status",
                                model: "status",
                                multi: true,
                                readonly: false,
                                featured: false,
                                disabled: false,
                                default: true,
                                textOn: "Active",
                                textOff: "Inactive"
                            },
                            {
                                type: 'input',
                                inputType: 'email',
                                label: 'E-mail',
                                model: 'email',
                                placeholder: 'User\'s e-mail address'
                            },
                            {
                                type: 'input',
                                inputType: 'password',
                                label: 'Password',
                                model: 'password',
                                min: 6,
                                required: true,
                                hint: 'Minimum 6 characters',
                                validator: 'string'
                            }
                        ]
                    },
                    {
                        legend: 'Skills & Status',
                        fields: [
                            {
                                type: 'select',
                                label: 'Skills',
                                model: 'skills',
                                values: ['Javascript', 'VueJS', 'CSS3', 'HTML5']
                            },
                            {
                                type: 'checkbox',
                                label: 'Status',
                                model: 'status',
                                default: true
                            }
                        ]
                    }
                ]
            },

            formOptions: {
                validateAfterLoad: false,
                validateAfterChanged: true,
                validateAsync: true
            },
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
