<div>
<div class="code-menu bg-homeImageContainer hide-scrollbar relative z-10 h-auto w-full
 flex-shrink-0 overflow-visible rounded-xl py-6 m-8 font-bold outline outline-offset-4
  outline-2 border-grey-600/10 text-white lg:w-[317px] widescreen:w-[317px] "
style="">
    <span class="flex flex-col pl-8 mt-2 text-MyYellow {{fontNameForArabic($locale, 'font-plex','font-space')}}">
        <span class="text-Mygray">" {{__('explorer')}} " => [</span>
        <span class="pl-3 flex flex-col ">
                <a style=" margin-left: 10px; width: calc(100% - 10px); font-size: 17px;"
                 class="code-link relative my-4 flex flex-col rounded border-none pl-3 text-left text-blue hover:bg-MyBlue hover:text-white" href="/blogs">
                 <span class="text-sm text-white">{{__('// Get Inspired by reading')}}</span>
                 <span>{{__('Nav Blogs')}}</span>
                </a>
        </span>
        <span class="pl-3 flex flex-col">
            <a style="margin-left: 10px; width: calc(100% - 10px); font-size: 17px;"
             class="code-link relative my-4 flex flex-col rounded border-none pl-3 text-left text-blue hover:bg-MyBlue hover:text-white" href="/all-categories">
             <span class="text-sm text-white">{{__('// Pick a Category')}}</span>
             <span>{{__('Categories')}}</span>
            </a>
    </span>
    <span class="pl-3 flex flex-col">
        <a style="margin-left: 10px; width: calc(100% - 10px); font-size: 17px;"
         class="code-link relative my-4 flex flex-col rounded border-none pl-3 text-left text-blue hover:bg-MyBlue hover:text-white" href="/all-hashtags">
         <span class="text-sm text-white">{{__('// Look for a Hashtag')}}</span>
         <span>{{__('Hashtags')}}</span>
        </a>
</span>
        <span class="text-Mygray">];</span>
    </span>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const codeMenu = document.querySelector('.code-menu');
    
        codeMenu.addEventListener('mousemove', function(e) {
            const rect = codeMenu.getBoundingClientRect();
            const mouseX = e.clientX - rect.left; // X position within the element.
            const mouseY = e.clientY - rect.top;  // Y position within the element.
    
            const centerX = rect.width / 2;
            const centerY = rect.height / 2;
    
            // Calculate how far the mouse is from the center, relative to the size of the element
            const deltaX = (mouseX - centerX) / 50; // Smaller divisor for subtler movement
            const deltaY = (mouseY - centerY) / 50; // Smaller divisor for subtler movement
    
            // Apply the calculated translation to the element
            // Adjusting the multiplier will change the "strength" of the movement
            const translateX = deltaX * -3; // Invert direction for opposite movement
            const translateY = deltaY * -3; // Invert direction for opposite movement
    
            codeMenu.style.transform = `translate(${translateX}px, ${translateY}px)`;
        });
    
        codeMenu.addEventListener('mouseleave', function() {
            // Reset the element's position when the mouse leaves
            codeMenu.style.transform = 'translate(0px, 0px)';
        });
    });
    </script>
    
</div>