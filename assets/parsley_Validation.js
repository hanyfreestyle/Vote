// This is included with the Parsley library itself,
// thus there is no use in adding it to your project.


Parsley.addMessages('en', {
  defaultMessage: "This value seems to be invalid.",
  type: {
    email:        "برجاء كتابة البريد الالكترونى بصورة صحيحة",
    url:          "This value should be a valid url.",
    number:       "هذه القيمة ارقام فقط",
    integer:      "This value should be a valid integer.",
    digits:       "This value should be digits.",
    alphanum:     "This value should be alphanumeric."
  },
  notblank:       "This value should not be blank.",
  required:       "هذا الحقل مطلوب",
  pattern:        "This value seems to be invalid.",
  min:            "This value should be greater than or equal to %s.",
  max:            "This value should be lower than or equal to %s.",
  range:          "This value should be between %s and %s.",
  minlength:      "لابد ان يكون رمز التأكيد  %s ارقام",
  maxlength:      "لابد ان يكون رمز التأكيد  %s ارقام",
  length:         "This value length is invalid. It should be between %s and %s characters long.",
  mincheck:       "You must select at least %s choices.",
  maxcheck:       "You must select %s choices or fewer.",
  check:          "You must select between %s and %s choices.",
  equalto:        "This value should be the same."
});

Parsley.setLocale('en');
