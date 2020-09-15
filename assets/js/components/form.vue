<template>
    <form method="post">
        <div class="fields">
            <div class="field">
                <div>
                    <label for="contact_name" class="required">Votre nom</label>
                    <input type="text" id="contact_name" name="contact[name]" required="required" :value="valueName">
                    <div v-if="errorName">{{ errorName }}</div>
                </div>
            </div>
            <div class="field">
                <div>
                    <label for="contact_email" class="required">Votre email</label>
                    <input type="email" id="contact_email" name="contact[email]" required="required" :value="valueEmail">
                    <div v-if="errorEmail">{{ errorEmail }}</div>
                </div>
            </div>
            <div class="field">
                <div>
                    <label for="contact_message" class="required">Votre message</label>
                    <textarea id="contact_message" name="contact[message]" required="required" :value="valueMessage"></textarea>
                    <div v-if="errorMessage">{{ errorMessage }}</div>
                </div>
            </div>
        </div>
        <ul class="actions">
            <li><input type="submit" value="Envoyer" /></li>
        </ul>
    </form>
</template>

<script>
export default {
    name: 'Form',
    data() {
        return {
            errors: null,
            errorName: null,
            errorEmail: null,
            errorMessage: null,
            valueName: null,
            valueEmail: null,
            valueMessage: null,
        }
    },
    created() {
        const app = document.getElementById('app')
        const errors = app.dataset.errors;

        // Here, null is a string, not a bool
        if (errors !== 'null') {
            const violations = JSON.parse(errors).violations;

            for (let i = 0; i < violations.length; i++) {
                this.addError('name', violations[i]);
                this.addError('email', violations[i]);
                this.addError('message', violations[i]);
            }
        }
    },
    methods: {
        addError(element, violation) {
            console.log(violation);
            if(violation.propertyPath === element) {
                //Make the first letter uppercase
                let elementUcfirst = element.charAt(0).toUpperCase() + element.slice(1);
                let errorElement = 'error' + elementUcfirst;
                //reference the associated variable initialize in data
                this[errorElement] = violation.title;
                let value = violation.parameters["\{\{ value \}\}"];
                let valueElement = 'value' + elementUcfirst;
                this[valueElement] = eval(value);
            }
        },
    }
}
</script>
