<template>
    <form method="post">
        <div class="fields">
            <div class="field">
                <div>
                    <label for="contact_name" class="required">Votre nom</label>
                    <input type="text" id="contact_name" name="contact[name]" required="required">
                </div>
            </div>
            <div class="field">
                <div>
                    <label for="contact_email" class="required">Votre email</label>
                    <input type="email" id="contact_email" name="contact[email]" required="required">
                </div>
            </div>
            <div class="field">
                <div>
                    <label for="contact_message" class="required">Votre message</label>
                    <textarea id="contact_message" name="contact[message]" required="required"></textarea>
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
}
</script>
