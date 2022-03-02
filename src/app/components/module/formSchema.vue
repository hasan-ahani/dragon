<template>
  <FormSchema ref="formSchema" v-bind="$props" v-model="model">
    <slot></slot>
  </FormSchema>
</template>

<script>

import FormSchema from 'vue-json-schema'
import dgInput from './../fields/dg-input.vue';
import dgField from './../fields/dg-field.vue';


const formItem = (elementInput) => ({
  disableWrappingLabel: true,
  render: (createElement, { props, slots }) => [
    createElement(dgField, props.input, [
      createElement('label', props.field.label),
      elementInput(createElement, { props, slots }),
      props.field.description
        ? createElement('small', props.field.description)
        : undefined
    ])
  ]
})

// const input = (tag) => formItem((h, { props, slots }) => {
//   return h(tag, props.input, slots().default)
// })

// const choice = (tag) => formItem((h, { props, slots }) => h(
//   tag, props.input, slots().default), false)



FormSchema.setComponent('email', formItem(dgInput))
// FormSchema.setComponent('password', input('md-input'))
// FormSchema.setComponent('text', input('md-input'))
// FormSchema.setComponent('file', input('md-file'))
// FormSchema.setComponent('textarea', input('md-textarea'))
// FormSchema.setComponent('checkbox', choice('md-checkbox'))
// FormSchema.setComponent('switch', input('md-switch'))
// FormSchema.setComponent('radio', choice('md-radio'))
// FormSchema.setComponent('checkboxgroup', 'div')
// FormSchema.setComponent('radiogroup', 'div')
// FormSchema.setComponent('select', input('md-select'))
// FormSchema.setComponent('option', 'md-option')
// FormSchema.setComponent('button', 'md-button')
// FormSchema.setComponent('buttonswrapper', 'div')

export default {
    data() {
        return {
            model: {}
        }
    },
  props: {
    /**
     * The JSON Schema object. Use the `v-if` directive to load asynchronous schema.
     * @type [Object, Promise]
     */
    schema: { type: [Object, Promise], required: true },

    /**
     * Use this directive to create two-way data bindings with the component. It automatically picks the correct way to update the element based on the input type.
     * @model
     * @default {}
     */
    value: { type: Object, default: () => ({}) },

    /**
     * @private
     */
    action: { type: String },

    /**
     * @private
     */
    autocomplete: { type: String },

    /**
     * @private
     */
    enctype: { type: String, default: 'application/x-www-form-urlencoded' },

    /**
     * @private
     */
    method: { type: String, default: 'post' },

    /**
     * @private
     */
    novalidate: { type: Boolean },

    /**
     * @private
     */
    inputWrappingClass: { type: String }
  },
  created () {
    setTimeout(() => this.reset(), 0)
  },
  methods: {
    formSchema () {
      return this.$refs.formSchema
    },
    submit () {
      this.formSchema().form().validate((valid) => {
        if (valid) {
          console.log(JSON.stringify(this.model))
          this.$refs.formSchema.clearErrorMessage()
          this.$emit('submit', this.model)
        } else {
          this.$refs.formSchema.setErrorMessage('Please fill out the required fields')
          this.$emit('invalid')
          return false
        }
      })
    },
    reset () {
      this.formSchema().form().reset()
    }
  },
  components: { FormSchema }
}
</script>
