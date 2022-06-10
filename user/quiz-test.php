<?php 

// if ( !isset($_SESSION['start_test'])  ) {

// }

include('../user/snippet/header.php');

?>
<!--Top Section-->
<div class="intro py-3 b-white text-center">
    <div class="container">
        <h2 class="text-primary display-3 my-4">Liquid Quiz</h2>
        <?php if (isset($_SESSION['user_data']['first_name'])) {?>
        <h2 class="text-primary display-6 my-1">Welcome: <?=ucfirst($_SESSION['user_data']['title']).' '.ucfirst($_SESSION['user_data']['first_name']).' '.ucfirst($_SESSION['user_data']['middle_name']).' '.ucfirst($_SESSION['user_data']['last_name'])?> </h2><br />
        <?php }?> 

    </div>
</div>

<div class="intro py-5 b-white text-center">
    <div class="container">
        <h2 class="text-primary display-6 my-1">Time</h2><br />
        <h2 class="text-primary display-6 my-1 countdown"></h2>
    </div>
</div>

<!--Result section-->
<div class="result py-4 d-none bg-light text-center">
    <div class="container lead">
        <p>You Scored<span class="text-primary display-4 p-3">0%</span></p>
    </div>
</div>

<!--Quiz section-->
<div class="quiz py-4 bg-primary">
    <div class="container">
        <h3 class="my-5 text-white">On with the questions...</h3>

        <form class="quiz-form text-light">
            <div class="my-5">
                <p class="lead font-weight-normal">1. Which one is the static section?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q1" value="A">
                    <label class="form-check-label">Collection list</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q1" value="B">
                    <label class="form-check-label">Featured Products</label>
                </div>  
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q1" value="C">
                    <label class="form-check-label">Slideshow</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q1" value="D">
                    <label class="form-check-label">Header</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">2. Which one is the dynamic section?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q2" value="A">
                    <label class="form-check-label">Header</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q2" value="B">
                    <label class="form-check-label">Product Template</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q2" value="C">
                    <label class="form-check-label">Featured Products</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q2" value="D">
                    <label class="form-check-label">Footer</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">3. What's a locale file and the extension of files?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q3" value="A">
                    <label class="form-check-label">Used for displaying section, .liquid</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q3" value="B">
                    <label class="form-check-label">Contains a set of translations, .json</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q3" value="C">
                    <label class="form-check-label">every language that's available in the theme, .liquid</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q3" value="D">
                    <label class="form-check-label">Contains a set of translations, .liquid</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">4. How many blocks can we create in a section?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q4" value="A">
                    <label class="form-check-label">5</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q4" value="B">
                    <label class="form-check-label">2</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q4" value="C">
                    <label class="form-check-label">1</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q4" value="D">
                    <label class="form-check-label">No limit</label>
                </div>
            </div>
            <div class="my-5">
                <p class="lead font-weight-normal">5. Why should we use {%- something -%} instead of this {% something %}?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q5" value="A">
                    <label class="form-check-label">No effect</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q5" value="B">
                    <label class="form-check-label">Remove whitespace</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q5" value="C">
                    <label class="form-check-label">Minify the code</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q5" value="D">
                    <label class="form-check-label">None of these</label>
                </div>
            </div>
            <div class="my-5">
                <p class="lead font-weight-normal">6. How can we add extenal script in theme.liquid file?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q6" value="A">
                    <label class="form-check-label"> {{'script.js'| asset_url}}</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q6" value="B">
                    <label class="form-check-label">{{'script.js'| asset_url | script_tag }}</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q6" value="C">
                    <label class="form-check-label">{{script src="script.js"}}</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q6" value="D">
                    <label class="form-check-label">All</label>
                </div>
            </div>
            <div class="my-5">
                <p class="lead font-weight-normal">7. Which filters return the asset folder url?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q7" value="A">
                    <label class="form-check-label"> asset_url</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q7" value="B">
                    <label class="form-check-label">asset_img_url</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q7" value="C">
                    <label class="form-check-label">file_url</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q7" value="D">
                    <label class="form-check-label">None of these</label>
                </div>
            </div>
            <div class="my-5">
                <p class="lead font-weight-normal">8. How can we add a logo from the assets folder within liquid?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q8" value="A">
                    <label class="form-check-label"> {{ ‘name_of_your_file.jpg’ | asset_url | img_tag }}</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q8" value="B">
                    <label class="form-check-label">{{ ‘name_of_your_file.jpg’ | asset_url | img_url : 'master' }}</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q8" value="C">
                    <label class="form-check-label">None of these</label>
                </div>
            </div>
            <div class="my-5">
                <p class="lead font-weight-normal">9. How to get variant id on product page?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q9" value="A">
                    <label class="form-check-label"> {{ variants.id }}</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q9" value="B">
                    <label class="form-check-label">{{ product.variant.id }}</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q9" value="C">
                    <label class="form-check-label">{{ variant.id }}</label>
                </div>
            </div>
            <div class="my-5">
                <p class="lead font-weight-normal">10. How to get the collection url using an object?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q10" value="A">
                    <label class="form-check-label"> {{ collection.url }}</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q10" value="B">
                    <label class="form-check-label">{{ collections[collection].url }}</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q10" value="C">
                    <label class="form-check-label">{{ collections.url }}</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q10" value="D">
                    <label class="form-check-label">None of these</label>
                </div>
            </div>
            <div class="my-5">
                <p class="lead font-weight-normal">11. Which one is the deprecated tags?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q11" value="A">
                    <label class="form-check-label"> {% assign %}</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q11" value="B">
                    <label class="form-check-label">{%include%}</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q11" value="C">
                    <label class="form-check-label">{% render %}</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q11" value="D">
                    <label class="form-check-label">{% unless %}</label>
                </div>
            </div>
            <div class="my-5">
                <p class="lead font-weight-normal">12. Is product_img_url -> srcset possible?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q12" value="A">
                    <label class="form-check-label">No</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q12" value="B">
                    <label class="form-check-label">Yes</label>
                </div>
            </div>
            <div class="my-5">
                <p class="lead font-weight-normal">13. controls the organization and content of the menu in the theme editor?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q13" value="A">
                    <label class="form-check-label">settings_schema.json</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q13" value="B">
                    <label class="form-check-label">schema_data.json</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q13" value="C">
                    <label class="form-check-label">None of these</label>
                </div>
            </div>
            <div class="my-5">
                <p class="lead font-weight-normal">14. If you try to access a deleted object which object is returned?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q14" value="A">
                    <label class="form-check-label">EmptyDrop</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q14" value="B">
                    <label class="form-check-label">Nil</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q14" value="C">
                    <label class="form-check-label">None of these</label>
                </div>
            </div>
            <div class="my-5">
                <p class="lead font-weight-normal">15. What is the role of "content_for_index" object?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q15" value="A">
                    <label class="form-check-label">the content of dynamic sections to be rendered on the home page</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q15" value="B">
                    <label class="form-check-label">the content of static sections to be rendered on the home page</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q15" value="C">
                    <label class="form-check-label">the content of both static and dynamic sections to be rendered on the home page</label>
                </div>
            </div>
            <div class="my-5">
                <p class="lead font-weight-normal">16. Which for tag parameter is used to exit the loop?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q16" value="A">
                    <label class="form-check-label">limit</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q16" value="B">
                    <label class="form-check-label">offset</label>
                </div>
            </div>
            <div class="my-5">
                <p class="lead font-weight-normal">17. "Strip" filter is used for?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q17" value="A">
                    <label class="form-check-label">Remove all whitespaces</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q17" value="B">
                    <label class="form-check-label">Remove whitespace form right side only</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q14" value="C">
                    <label class="form-check-label">None of these</label>
                </div>
            </div>
            <div class="my-5">
                <p class="lead font-weight-normal">18. "money_without_trailing_zeros" filter is used for?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q18" value="A">
                    <label class="form-check-label">excludes the decimal point and trailing zeros</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q18" value="B">
                    <label class="form-check-label">excludes the trailing zeros only</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q18" value="C">
                    <label class="form-check-label">None of these</label>
                </div>
            </div>
            <div class="my-5">
                <p class="lead font-weight-normal">19. Which filter is used to combine two arrays?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q19" value="A">
                    <label class="form-check-label">append</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q19" value="B">
                    <label class="form-check-label">concat</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q19" value="C">
                    <label class="form-check-label">merge</label>
                </div>
            </div>
            <div class="my-5">
                <p class="lead font-weight-normal">20. Which one used for getting current page url?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q20" value="A">
                    <label class="form-check-label">{{ current_page.url }}</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q20" value="B">
                    <label class="form-check-label">{{ request.path }}</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q20" value="C">
                    <label class="form-check-label">{{ shop.url }}</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">21. Why do we use “article.excerpt” ?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q21" value="A">
                    <label class="form-check-label">To print the content of article</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q21" value="B">
                    <label class="form-check-label">To print the main image of the article</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q21" value="C">
                    <label class="form-check-label">To print the summary of the article</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q21" value="D">
                    <label class="form-check-label">None of these</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">22. How many blocks can we add in a particular section?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q22" value="A">
                    <label class="form-check-label">20</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q22" value="B">
                    <label class="form-check-label">16</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q22" value="C">
                    <label class="form-check-label">12</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q22" value="D">
                    <label class="form-check-label">8</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">23. Is it possible to declare more than one block array in a section??</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q23" value="A">
                    <label class="form-check-label">Yes</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q23" value="B">
                    <label class="form-check-label">No</label>
                </div>
            </div>


            <div class="my-5">
                <p class="lead font-weight-normal">24. To return the total price of all items after the discount has been applied on cart page what should we use?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q24" value="A">
                    <label class="form-check-label">cart.total_price
                    </label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q24" value="B">
                    <label class="form-check-label">cart.total_original_price</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q24" value="C">
                    <label class="form-check-label">cart.total_disocunt</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q24" value="D">
                    <label class="form-check-label">None of these</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">25. Best way to delete the whole cart items?
                    ?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q25" value="A">
                    <label class="form-check-label">Using an cart clear api </label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q25" value="B">
                    <label class="form-check-label">Remove each item</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q25" value="C">
                    <label class="form-check-label">By making quantity 0 for each item in cart</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q25" value="D">
                    <label class="form-check-label">None of these</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">26. What do you understand by “template_suffix” for collection and product pages?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q26" value="A">
                    <label class="form-check-label">It is used to make changes on default layout product or collection template</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q26" value="B">
                    <label class="form-check-label">It is used for creating an alternate layout and make changes as you want in both collection and product</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q26" value="C">
                    <label class="form-check-label">None of these</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">27. What should it return when we use {{ product_title }} ?<br />
                    {% capture product_title %}<br />
                    {% for product in collection.products %}<br />
                    {{ product.title }}<br />
                    {% unless forloop.last %}<br />
                    ,<br />
                    {% endunless %}<br />
                    {% endfor %}<br />
                    {% endcapture %}
                </p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q27" value="A">
                    <label class="form-check-label">product_title1, product_title2, product_title3,….. product_titleN,
                    </label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q27" value="B">
                    <label class="form-check-label">product_title1,product_title2,product_title3,…..product_titleN</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q27" value="C">
                    <label class="form-check-label">product_title1product_title2product_title3….product_titleN,</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">28. Is it possible to change the handle of a product or collection after creating it?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q28" value="A">
                    <label class="form-check-label">Yes</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q28" value="B">
                    <label class="form-check-label">No</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">29. How to get the current template name?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q28" value="A">
                    <label class="form-check-label">current_template.name</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q29" value="B">
                    <label class="form-check-label">template.name</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q29" value="C">
                    <label class="form-check-label">page.name</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q29" value="D">
                    <label class="form-check-label">Template.title
                    </label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">30. How many levels are supported in a linked list in shopify?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q30" value="A">
                    <label class="form-check-label">2</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q30" value="B">
                    <label class="form-check-label">3</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q30" value="C">
                    <label class="form-check-label">4</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q30" value="D">
                    <label class="form-check-label">5</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">31. Which form is used for adding a product into cart, and what are the required fields for adding product into cart?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q31" value="A">
                    <label class="form-check-label">Add to cart form, product id and quantity
                    </label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q31" value="B">
                    <label class="form-check-label">Product form, variant id and quantity
                    </label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q31" value="C">
                    <label class="form-check-label">Product form, product id and quantity</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q31" value="D">
                    <label class="form-check-label">Add to cart form, variant id and quantity</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">32. Output of this code:-
                    {{ 145 | money_with_currency }}?
                </p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q32" value="A">
                    <label class="form-check-label">$145.00</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q32" value="B">
                    <label class="form-check-label">$14.5</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q32" value="C">
                    <label class="form-check-label">$1.45</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q32" value="D">
                    <label class="form-check-label">None of these
                    </label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">33. How to get the array size in liquid?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q33" value="A">
                    <label class="form-check-label">Array.length</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q33" value="B">
                    <label class="form-check-label">Array.size</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q33" value="C">
                    <label class="form-check-label">sizeof(array)</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q33" value="D">
                    <label class="form-check-label">array.length()</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">34. How to access the variant-based metafields?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q34" value="A">
                    <label class="form-check-label">variant.namespace.key</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q34" value="B">
                    <label class="form-check-label">variant.metafields.namespace.key</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q34" value="C">
                    <label class="form-check-label">variant.metafields[namespace].key</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q34" value="D">
                    <label class="form-check-label">variant[namespace].key</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">35. If a product is available in red, blue in color and having size X, M, L so what will be the output of this code?<br />
                    {% for option in product.options %}<br />
                    {{ option }}:<br />
                    {% for option_value in product.options_by_name[option].values %}<br />
                    <option>{{ option_value }}</option><br />
                    {% endfor %}<br />
                    {% endfor %}<br />

                </p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q35" value="A">
                    <label class="form-check-label">It will list all the option names only</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q35" value="B">
                    <label class="form-check-label">It will list all the option values only</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q35" value="C">
                    <label class="form-check-label">It will list all the option values along with option name</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q35" value="D">
                    <label class="form-check-label">It will list option name with variant title</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">36. In which file, we can add global theme settings?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q36" value="A">
                    <label class="form-check-label">In any file of the section
                    </label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q36" value="B">
                    <label class="form-check-label">In the config folder, settings_schema.json</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q36" value="C">
                    <label class="form-check-label">In the config folder, settings_data.json </label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q36" value="D">
                    <label class="form-check-label">In layout, theme.liquid</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">37. If a customer is eligible for an automatic discount and uses a new discount on checkout, which discount will work?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q37" value="A">
                    <label class="form-check-label">Automatic discount</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q37" value="B">
                    <label class="form-check-label">Manual discount</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q37" value="C">
                    <label class="form-check-label">Both</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">38. What is the concept of draft order?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q38" value="A">
                    <label class="form-check-label">Orders which are not fulfill</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q38" value="B">
                    <label class="form-check-label">Orders whose payment is not done</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q38" value="C">
                    <label class="form-check-label">Orders placed by merchant for a specific customer</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q38" value="D">
                    <label class="form-check-label">Once the customer places an order it would be in draft until it is delivered
                    </label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">39. Inventory syncing in shopify is based on?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q39" value="A">
                    <label class="form-check-label">Product id</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q39" value="B">
                    <label class="form-check-label">Product SKU</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q39" value="C">
                    <label class="form-check-label">Variant id</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q39" value="D">
                    <label class="form-check-label">Variant SKU</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">40. Mandatory keys for creating a schema settings for text field?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q40" value="A">
                    <label class="form-check-label">Id, type, name, value</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q40" value="B">
                    <label class="form-check-label">Id, label, name</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q40" value="C">
                    <label class="form-check-label">Id, name, type</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q40" value="D">
                    <label class="form-check-label">Id, label, type</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">41. What is the limit of product in the collection for showing the collection filter?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q41" value="A">
                    <label class="form-check-label">600</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q41" value="B">
                    <label class="form-check-label">900</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q41" value="C">
                    <label class="form-check-label">1000</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q41" value="D">
                    <label class="form-check-label">None of These</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">42. Which method is used to create the data using API Call?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q42" value="A">
                    <label class="form-check-label">GET</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q42" value="B">
                    <label class="form-check-label">POST</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q42" value="C">
                    <label class="form-check-label">PUT</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q42" value="D">
                    <label class="form-check-label">OPTIONS</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">43. What does the meaning of published_scope: web in product JSON?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q43" value="A">
                    <label class="form-check-label">Available on the online store</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q43" value="B">
                    <label class="form-check-label">On all the Sales Channel</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q43" value="C">
                    <label class="form-check-label">Only POS</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q43" value="D">
                    <label class="form-check-label">None of the above</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">44. What does the meaning of requires_shipping: false in variant json?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q44" value="A">
                    <label class="form-check-label">Product is available for the shipping</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q44" value="B">
                    <label class="form-check-label">Product Shipping is required</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q44" value="C">
                    <label class="form-check-label">Product is not available for sale</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q44" value="D">
                    <label class="form-check-label">Shipping is not required</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">45. How many variants are possible to create in the Shopify?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q45" value="A">
                    <label class="form-check-label">250</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q45" value="B">
                    <label class="form-check-label">120</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q45" value="C">
                    <label class="form-check-label">100</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q45" value="D">
                    <label class="form-check-label">1000</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">46. How many options are by default available in shopify?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q46" value="A">
                    <label class="form-check-label">4</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q46" value="B">
                    <label class="form-check-label">0</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q46" value="C">
                    <label class="form-check-label">3</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q46" value="D">
                    <label class="form-check-label">1</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">47. What is the endpoint for the product count?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q47" value="A">
                    <label class="form-check-label">admin/2022-01/count.json</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q47" value="B">
                    <label class="form-check-label">admin/api/01-2022/products/count.json</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q47" value="C">
                    <label class="form-check-label">admin/api/2022-01/product/count.json</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q47" value="D">
                    <label class="form-check-label">admin/api/2022-01/products/count.json</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">48. What is the endpoint for getting a particular order?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q48" value="A">
                    <label class="form-check-label">admin/2022-01/order.json</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q48" value="B">
                    <label class="form-check-label">admin/api/01-2022/order.json</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q48" value="C">
                    <label class="form-check-label">admin/api/2022-01/order/{order_id}.json</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q48" value="D">
                    <label class="form-check-label">admin/api/2022-01/singleOrder.json
                    </label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">49. Which Layout is used for rendering the Homepage?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q49" value="A">
                    <label class="form-check-label">index.liquid</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q49" value="B">
                    <label class="form-check-label">theme.liquid</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q49" value="C">
                    <label class="form-check-label">home.liquid</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q49" value="D">
                    <label class="form-check-label">None of the above</label>
                </div>
            </div>

            <div class="my-5">
                <p class="lead font-weight-normal">50. Which statement satisfies the EmptyDrop Object?</p>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q50" value="A">
                    <label class="form-check-label">It is returned when you try to access non-existent object
                    </label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q50" value="B">
                    <label class="form-check-label">It is returned when you try to access existing object</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q50" value="C">
                    <label class="form-check-label">It is returned when you try to access an object</label>
                </div>
                <div class="form-check my-2 text-white-50">
                    <input type="radio" name="q50" value="D">
                    <label class="form-check-label">None of the above
                    </label>
                </div>
            </div>

            <div class="text-center">
                <input type="submit" class="btn btn-light">
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
       
    </script>
<?php include('../user/snippet/footer.php'); ?>