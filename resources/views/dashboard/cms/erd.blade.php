<x-layouts.app>
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold text-gray-900 text-center mb-4">Entity Relationship Diagram</h1>

        <div class="grid auto-rows-min gap-4">
            <!-- Informasi Umum Website -->
            <div class="bg-zinc-50 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 my-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Informasi Umum Website</h2>
                <p class="text-gray-600 mb-4">Data ini berisi informasi utama untuk halaman depan website.</p>

                <x-mermaid>
                    erDiagram
                    HeroSection {
                    int id PK
                    string title
                    string subtitle
                    string motto
                    string button_text
                    string image
                    }

                    Video {
                    int id PK
                    string youtube_link
                    }

                    About {
                    int id PK
                    string title
                    string description
                    string vision
                    string mission
                    }

                    Counter {
                    int id PK
                    string title
                    int number
                    }

                    Setting {
                    int id PK
                    string logo
                    string phone
                    string email
                    string address
                    string google_maps_link
                    string linkedin_link
                    string instagram_link
                    string tiktok_link
                    string footer_text
                    }
                </x-mermaid>
            </div>

            <!-- Konten Dinamis & Layanan -->
            <div class="bg-zinc-50 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 my-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Konten Dinamis & Layanan</h2>
                <p class="text-gray-600 mb-4">Data ini berkaitan dengan layanan dan informasi yang dapat diperbarui.</p>

                <x-mermaid>
                    erDiagram
                    WorkProcess {
                    int id PK
                    string title
                    string description
                    }

                    Service {
                    int id PK
                    string icon
                    string image
                    string title
                    string description
                    }

                    Member {
                    int id PK
                    string photo
                    string name
                    string position
                    string qualifications
                    string attributes
                    string skills
                    }

                    FAQ {
                    int id PK
                    string question
                    string answer
                    }
                </x-mermaid>
            </div>

            <!-- Project & Klien -->
            <div class="bg-zinc-50 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 my-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Project & Klien</h2>
                <p class="text-gray-600 mb-4">Data ini digunakan untuk mengelola portolio dan klien.</p>

                <x-mermaid>
                    erDiagram
                    Client {
                    int id PK
                    string name
                    string email
                    string phone
                    string company
                    string photo
                    }

                    Testimonial {
                    int id PK
                    int client_id FK
                    string title
                    string description
                    int rating
                    }

                    Project {
                    int id PK
                    int client_id FK
                    string image
                    string title
                    string description
                    date project_date
                    string duration
                    decimal cost
                    }

                    Client ||--o{ Project : has
                    Client ||--o{ Testimonial : has
                </x-mermaid>

            </div>

            <!-- Blog & Kategori -->
            <div class="bg-zinc-50 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 my-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Blog & Kategori</h2>
                <p class="text-gray-600 mb-4">Data ini digunakan untuk mengelola artikel blog dan kategorinya.</p>

                <x-mermaid>
                    erDiagram
                    Blog {
                    int id PK
                    int category_id FK
                    string title
                    string description
                    string author
                    int comment_count
                    }

                    Category {
                    int id PK
                    string name
                    }

                    Tag {
                    int id PK
                    string name
                    }

                    Comment {
                    int id PK
                    int blog_id FK
                    int user_id FK
                    string content
                    datetime created_at
                    }

                    BlogTag {
                    int id PK
                    int blog_id FK
                    int tag_id FK
                    }

                    User {
                    int id PK
                    string name
                    string email
                    string password
                    timestamp created_at
                    }

                    Blog ||--o{ Comment : has
                    Blog ||--o{ Category : belongs_to
                    Blog ||--o{ BlogTag : many_to_many
                    Tag ||--o{ BlogTag : many_to_many
                    User ||--o{ Comment : has
                </x-mermaid>
            </div>

            <!-- Sistem Harga & Layanan Berbayar -->
            <div class="bg-zinc-50 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 my-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Sistem Harga & Layanan Berbayar</h2>
                <p class="text-gray-600 mb-4">Data ini mengelola paket harga dan layanan yang termasuk di dalamnya.</p>

                <x-mermaid>
                    erDiagram
                    PricingPlan {
                    int id PK
                    string title
                    decimal price
                    string description
                    }

                    PricingService {
                    int id PK
                    int pricing_plan_id FK
                    string service_item
                    }

                    PricingPlan ||--o{ PricingService : includes
                </x-mermaid>
            </div>

            <!-- Manajemen Pengguna & Autentikasi -->
            <div class="bg-zinc-50 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 my-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Manajemen Pengguna & Autentikasi</h2>
                <p class="text-gray-600 mb-4">Data ini digunakan untuk mengelola informasi pengguna dan sesi login.</p>

                <x-mermaid>
                    erDiagram
                    Users {
                    int id PK
                    string name
                    string email
                    timestamp email_verified_at
                    string password
                    string remember_token
                    timestamp created_at
                    timestamp updated_at
                    }

                    PasswordResetToken {
                    string email PK
                    string token
                    timestamp created_at
                    }

                    Sessions {
                    string id PK
                    int user_id FK
                    string ip_address
                    text user_agent
                    longtext payload
                    int last_activity
                    }

                    Users ||--o{ Sessions : has
                    Users ||--o{ PasswordResetToken : has
                </x-mermaid>
            </div>

            <!-- Sistem Peran & Hak Akses -->
            <div class="bg-zinc-50 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 my-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Sistem Peran & Hak Akses</h2>
                <p class="text-gray-600 mb-4">Data ini mengatur izin akses dan peran pengguna dalam sistem.</p>

                <x-mermaid>
                    erDiagram
                    Permissions {
                    int id PK
                    string name
                    string guard_name
                    timestamp created_at
                    timestamp updated_at
                    }

                    Roles {
                    int id PK
                    string name
                    string guard_name
                    timestamp created_at
                    timestamp updated_at
                    }

                    ModelHasPermissions {
                    int permission_id FK
                    string model_type
                    int model_id
                    int team_foreign_key FK
                    }

                    ModelHasRoles {
                    int role_id FK
                    string model_type
                    int model_id
                    int team_foreign_key FK
                    }

                    RoleHasPermissions {
                    int permission_id FK
                    int role_id FK
                    }

                    Permissions ||--o{ RoleHasPermissions : has
                    Roles ||--o{ RoleHasPermissions : has
                    Permissions ||--o{ ModelHasPermissions : has
                    Roles ||--o{ ModelHasRoles : has
                </x-mermaid>
            </div>

            <!-- Sistem Antrian & Batch Processing -->
            <div class="bg-zinc-50 rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 my-6">
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Sistem Antrian & Batch Processing</h2>
                <p class="text-gray-600 mb-4">Data ini mengatur sistem antrian dan pemrosesan batch dalam Laravel.</p>

                <x-mermaid>
                    erDiagram
                    Jobs {
                    int id PK
                    string queue
                    string payload
                    int attempts
                    int reserved_at
                    int available_at
                    int created_at
                    }

                    JobBatch {
                    string id PK
                    string name
                    int total_jobs
                    int pending_jobs
                    int failed_jobs
                    string failed_job_ids
                    string options
                    int cancelled_at
                    int created_at
                    int finished_at
                    }

                    FailedJobs {
                    int id PK
                    string uuid
                    string connection
                    string queue
                    string payload
                    string exception
                    string failed_at
                    }
                </x-mermaid>
            </div>
        </div>
    </div>
</x-layouts.app>
