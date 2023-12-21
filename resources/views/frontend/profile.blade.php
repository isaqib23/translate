@extends('frontend.layout.app')
@section('content')
<style>
        .arabic-content {
            display: none;
            direction: rtl;
        }
    </style>
<div class="container">
        <div class="language-selector" style="margin-bottom: 20px; text-align: right;
                                                                      position: relative;">
            <button class="btn btn-primary" onclick="showEnglish()">English</button>
            <button class="btn btn-primary" onclick="showArabic()">العربية</button>
        </div>

        <!-- English Content -->
        <div class="english-content">
            <h1 class="text-center">Translingu For Legal Translation Editing & Proofreading Services L.L.C</h1>
            <h3>About Us:</h3>
            <p>
               <strong>Translingu</strong> is quickly built company in the area of language services thanks to highly trained experienced translation team, The Company specializes in legal translation service and Localization for all core languages.
               </p>

               <h3>Company Activities:</h3>
               <ul>
               <li><strong>Legal Translation and Localization:</strong>
               offering precise and specialized translation services for legal and conventional documents professionally for all kinds of Translation.</li>
               <li> <strong>Drafting & Typing Documents:</strong> offering typing services as well as competent drafting of legal documents.</li>
               <li> <strong>E- applications:</strong> highly efficient receipt and processing of linguistic applications via Internet.</li>
                </ul>

                <h3>Company Expertise :</h3>
                <p>Translingu avails team of translation experts with over twenty years of business expert in United Arab Emirates. They have worked with numerous governmental and judicial authorities, providing them with a unique perspective on the needs of the local market.</p>
                <h3>Company Vision:</h3>
                <p>Our vision is to be a breakthrough in translation services, where excellence is the use of the Internet and E-platforms. The goal is to provide translation services in a straightforward and easy-to-access manner, especially for clients with limited knowledge of Internet.</p>
                <h3>Contact Us:</h3>
                <p>For more information or to contract with us, you can contact us via [Email] or [Phone]. We are dedicated to meeting your linguistic requirements with professionalism and High quality.</p>
        </div>

        <!-- Arabic Content -->
        <div class="arabic-content">
            <h1 class="text-center">ترانس لينجو لخدمات الترجمة القانونية والتدقيق اللغوي ش.ذ.م.م</h1>
            <h3>نبذة عن الشركة:</h3>
            <p>تأسست شركة "ترانس لينجو" واستطاعت أن تترسخ في عالم الخدمات اللغوية بفضل توليفة قوية من خبراء الترجمة. تركز الشركة على تقديم خدمات الترجمة
               القانونية والتوطين اللغوي لكافة اللغات الحية.</p>

               <h3>أنشطة الشركة:</h3>
               <ul>
               <li><strong>الترجمةالقانونيةوالتوطيناللغوي:</strong>
               تقديمخدمات
               ترجمة متخصصة للوثائق القانونية بدقة ومهنية
                لجميع أنواع الترجمات.
                <li> <strong>طباعة وصياغة الوثائق:</strong> توفير خدمات الطباعة
                                                            وصياغة المستندات القانونية بأسلوب محترف. </li>
               <li> <strong>الطلبات الإلكترونية:</strong> استقبال ومعالجة الطلبات
                                                          اللغوية عبر وسائل الإنترنت بكفاءة عالية. </li>
                </ul>

                <h3>خبرة الشركة:</h3>
                <p>تضم "ترانس لينجو" فريقًا من خبراء الترجمة الذين يمتلكون خبرة تتجاوز العشرين عا ًما في مجال الأعمال في دولة الإمارات. لقد تعاونوا مع مختلف الجهات الحكومية والقضائية، مما يمنحهم رؤية فريدة
                   لاحتياجات السوق المحلية.</p>
                <h3>رؤية الشركة:</h3>
                <p>تتمثل رؤية "ترانس لينجو" في تحقيق طفرة في خدمات الترجمة، حيث يتمثل التميز في استخدام الإنترنت والمنصات الإلكترونية. الهدف هو تقديم خدمات ترجمة بطريقة بسيطة وسهلة الوصول حتى للعملاء الذين يمتلكون معرفة محدودة في التعامل مع
                   الإنترنت.</p>
                <h3>اتصل بنا:</h3>
                <p>للمزيد من المعلومات أو للتعاقد معنا، يمكنك الاتصال بنا عبر البريد الإلكتروني [Email] أو الهاتف .]Phone[ نحن هنا لتلبية احتياجاتك اللغوية بمهنية وجودة عالية.</p>
        </div>
    </div>
    <script>
            function showEnglish() {
                document.querySelector('.english-content').style.display = 'block';
                document.querySelector('.arabic-content').style.display = 'none';
            }

            function showArabic() {
                document.querySelector('.english-content').style.display = 'none';
                document.querySelector('.arabic-content').style.display = 'block';
            }
        </script>
@endsection
