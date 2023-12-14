<?php

namespace Database\Seeders;

use App\Models\SubCategory;
use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Membuat SubCategory untuk Kategori 1
        $this->createSubCategories(1, [
            'Spinal Implants',
            'Locking Plates and Screws',
            'Interlocking Nails and Bolts',
            'Large Fragment Plates',
            'Small Fragment Plates',
            'Implants For Hip Fixation',
            'External Fixaters',
            'Arthroscopic Implants',
            'Maxilofacial Implants',
        ]);

        // Membuat SubCategory untuk Kategori 2
        $this->createSubCategories(2, [
            'Basic Instruments',
            'Other Instruments',
            'Plaster Instruments',
            'Wire Instruments',
            'Spine Surgery Instruments',
            'Bone Holding Forceps',
            'Bone Lever / Retractors / Elevators / Osteotomes',
            'A.M. Prosthesis Instruments',
            'D.H.S / D.C.S. Instruments',
            'Radius / Ulna Nailing Instruments',
            'Maxilofacial Instruments',
            'General Instruments',
        ]);

        // Membuat SubCategory untuk Kategori 3
        $this->createSubCategories(3, [
            'Minor Basic Instrument Set',
            'Abdominal Gynecology Set',
            'Abdominal Hysterectomy Instruments Set',
            'Amputation Instruments Set',
            'Appendectomy And Hernia Set',
            'AV-Shunt Instruments Set',
            'Bandage Instruments Set',
            'Basic Adult Surgery Set',
            'Basic Eye Instruments Set',
            'Basic Eye Surgery Set',
            'Basic Orthopedic Set',
            'Bladder Instruments Set',
            'Bowel Resection Set',
            'Cataract Instruments Set',
            'Chalazion Instruments Set',
            'Circumsision Instruments Set',
            'Colectomy Instruments Set',
            'Common Duct Instruments Set',
            'Craniotomy Instruments Set',
            'Curettage Set',
            'Debridements Instruments Set',
            'Dilatation And Curette Instruments Set',
            'Embryotomy Instruments Set',
            'Ent Instruments Set',
            'Gastro Intestinal Set',
            'Gynaecology Instrument Set',
            'Hack Extra General Instruments Set',
            'Hechting Set',
            'Hemoroidectomy Set',
            'Herniotomy Instruments Set',
            'Hysterectomy Set',
            'Intubation Set',
            'Laminectomy Instruments Set',
            'Laparatomy Instruments Set',
            'Mastectomy Set',
            'Mastoidectomy Instruments Set',
            'Mayor Basic Set',
            'Mayor Orthopedi Set',
            'Minor Ear Set',
            'Myomectomy Instruments Set',
            'Nephrectomy Intruments Set',
            'Neurosurgery Set',
            'Obgyn Surgery Set',
            'Opthalmology Instruments Set',
            'Oral Surgery Instruments Set',
            'Pap Smear Set',
            'Partus Set',
            'Pediatric Surgery Set',
            'Plastic Surgery Set',
            'Policlinic Instruments Set',
            'Polypectomy Instruments Set',
            'Prostatectomy Instruments Set',
            'Sectio Caeseran Set',
            'Small Instruments Set',
            'Small Orthopedi Instruments Set',
            'Thoractomy Instruments Set',
            'THT Instruments Set',
            'Thyroidectomy Instruments Set',
            'Tonsillectomy Instruments Set',
            'Tracheostomy Instruments Set',
            'Tympanoplasty Set',
            'Urology Instruments Set',
            'Vascular Instruments Set',
            'Venae Section Instrument Set',
        ]);
    }

    /**
     * Membuat SubCategory untuk kategori tertentu.
     *
     * @param int $category_id
     * @param array $subCategoriesData
     */
    private function createSubCategories(int $category_id, array $subCategoriesData): void
    {
        foreach ($subCategoriesData as $subCategoryName) {
            // Membuat slug dari nama
            $slug = strtolower(str_replace(' ', '-', $subCategoryName));

            // Membuat SubCategory baru
            SubCategory::create([
                'category_id' => $category_id,
                'name' => $subCategoryName,
                'slug' => $slug,
            ]);
        }
    }
}
