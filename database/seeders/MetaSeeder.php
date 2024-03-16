<?php

namespace Database\Seeders;

use App\Models\Home;
use Illuminate\Database\Seeder;

class MetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Home::create([
            'meta_title' => 'Fabric Company in Bangladesh | Knit Express',
            'meta_keywords' => 'Fabric Company in Bangladesh',
            'meta_description' => 'Knit Express is a specialist fabric company that combines expertise in fabric production with many years of experience as the best fabric company in Bangladesh.',
        
            'about_meta_title' => 'Fabric Manufacturing Company in Bangladesh | Knit Express',
            'about_meta_keywords' => 'Fabric Manufacturing Company',
            'about_meta_description' => 'Knit Express is one of Bangladesh\'s leading fabric manufacturing companies. We provide information about fabric production, quality, and our manufacturing processes in this section.',
        
            'team_meta_title' => 'The Best Fabric Production Team In Dhaka | Knit Express',
            'team_meta_keywords' => 'Best Fabric Production Team In Dhaka',
            'team_meta_description' => 'In terms of knowledge and experience, we are ahead of the competition when it comes to fabric production. As a result, we have the best fabric production team in Dhaka.',
        
            'gallery_meta_title' => 'Fabric Production Showcase | Knit Express',
            'gallery_meta_keywords' => 'Fabric Production Showcase',
            'gallery_meta_description' => 'To showcase our fabric production capabilities and increase the credibility of our clients, we have included live images of all the fabric production work done by Knit Express in the gallery.',
        
            'career_meta_title' => 'Fabric Industry Careers | Knit Express',
            'career_meta_keywords' => 'Fabric Industry Careers',
            'career_meta_description' => 'Embark on a rewarding career in the fabric industry with Knit Express. Our training programs enable our employees to become experienced professionals in fabric production.',
        
            'contact_meta_title' => 'Contact Us As A Fabric Company | Knit Express',
            'contact_meta_keywords' => 'Contact Us As A Fabric Company',
            'contact_meta_description' => 'You can contact us as a fabric company, and we will provide you with high-quality fabric products. Reach out to us via phone, email, or visit our office using the Google map directions.',
        
            'project_meta_title' => 'Best Fabric Production Projects | Knit Express',
            'project_meta_keywords' => 'Fabric Production Projects',
            'project_meta_description' => 'Explore some of the significant fabric production projects undertaken by Knit Express. Our completed projects showcase our expertise and establish Knit Express as a top fabric company in Bangladesh.',
        
            'media_meta_title' => 'Fabric Production Highlights in the Media | Knit Express',
            'media_meta_keywords' => 'Fabric Production Highlights in the Media',
            'media_meta_description' => 'Knit Express showcases fabric production works highlighted in various media outlets. Our media presence increases visibility and reinforces trust among clients in the fabric industry.',
        ]);    
    }
}
