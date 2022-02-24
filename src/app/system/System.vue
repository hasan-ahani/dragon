<template>
    <div id="system">
        <div class="header">
            <a class="logo">
                Dragon Design System
            </a>

        </div>
        <div class="main">
            <div class="sidebar">
                <ul class="menu">
                    <li v-for="(menu , index) in menus" :class="{'active' : index === active}" @click="active === index ? active = '' : active = index" :key="index">
                        <div>
                            <span>{{index}}</span>
                            <i class="dr dr-arrow-right-3"></i>
                        </div>
                        <ul v-if="menu.length">
                            <li  v-for="(submenu , i) in menu" :key="i">
                                <span>{{submenu}}</span>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="content">

            </div>
        </div>


    </div>
</template>

<script>
export default {
    name: "System",
    data() {
        return{
            active: '',
            menus: {
                Brand: [
                    'Color',
                    'Typography'
                ],
                Layout: [
                    'Breakpoints',
                    'Containers',
                    'Grid',
                    'Columns',
                    'Gutters'
                ],
                Forms: [
                    'Controls',
                    'Select',
                    'Checks',
                    'Range',
                    'InputGroup',
                    'Validation',
                ],
                Components: [
                    'Accordion',
                    'Alerts',
                    'Breadcrumb',
                    'Buttons',
                    'Choose',
                    'Card',
                    'Carousel',
                    'Dropdowns',
                    'List',
                    'Modal',
                    'Navs',
                    'Pagination',
                    'Scroll',
                    'Spinners',
                    'Toasts',
                    'Tooltips'
                ],
            }

        }
    }
}
</script>

<style lang="scss">
#system{
    height: 100vh;
    overflow: hidden;
    display: flex;
    flex-direction: column;

    .header{
        height: 60px;

    }
    .main{
        flex: 1;
        display: flex;
        flex-direction: row;
    }
    .sidebar{
        width: 20%;
        max-width: 300px;
        padding: 24px 0;

        ul{
            padding: 0;
            margin: 0;
            list-style: none;
        }
    }
    .content{
        padding: 25px;
        background-color: #efefef;
        flex: 1;
        border-radius: 16px 0 0;
    }

    .menu > li{

        padding: 7px 12px;
        cursor: pointer;

        div {
            display: flex;
            justify-content: space-between;
        }
        ul{
           visibility: hidden;
            max-height: 0;
            overflow: hidden;
            transition: all .2s ease-in-out;
            background-color: #f0f2f7;
            padding: 10px;
            margin: 10px 0 0;
            border-radius: 8px;
        }


        &.active ul{
            visibility: visible;
            max-height: 500px;
            overflow: unset;
        }
    }
}
</style>
