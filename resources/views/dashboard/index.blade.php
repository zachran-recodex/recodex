<x-layouts.app>
    <flux:container class="space-y-6">
        <!-- Page Header -->
        <div class="sm:flex sm:items-center sm:justify-between">
            <div>
                <flux:heading size="xl" class="font-bold!">Hello {{ auth()->user()->name }}! 🙌🏻</flux:heading>
                <flux:subheading class="mt-2">
                    Welcome to Dashboard
                </flux:subheading>
            </div>
        </div>

        <flux:separator />

        <!-- Main Fee Distribution Card -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Primary Distribution Card -->
            <flux:card>
                <flux:card.header>
                    <flux:heading size="lg">Primary Fee Allocation</flux:heading>
                </flux:card.header>
                <flux:card.body>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <span>Company</span>
                                <flux:badge color="red" size="sm" variant="solid">10%</flux:badge>
                            </div>
                            <span class="font-medium">Operational & Development</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <span>Project Team</span>
                                <flux:badge color="zinc" size="sm" variant="solid">90%</flux:badge>
                            </div>
                            <span class="font-medium">Team Distribution</span>
                        </div>
                    </div>
                </flux:card.body>
            </flux:card>

            <!-- Team Distribution Card -->
            <flux:card>
                <flux:card.header>
                    <flux:heading size="lg">Team Fee Distribution</flux:heading>
                </flux:card.header>
                <flux:card.body>
                    <div class="space-y-4">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <span>Zachran</span>
                                <flux:badge color="blue" size="sm" variant="solid">36%</flux:badge>
                            </div>
                            <span class="text-sm text-zinc-600 dark:text-zinc-200">Technical Lead & Development</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <span>Adnin</span>
                                <flux:badge color="amber" size="sm" variant="solid">21%</flux:badge>
                            </div>
                            <span class="text-sm text-zinc-600 dark:text-zinc-200">QA & Documentation</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <span>Raista</span>
                                <flux:badge color="purple" size="sm" variant="solid">18%</flux:badge>
                            </div>
                            <span class="text-sm text-zinc-600 dark:text-zinc-200">UI/UX Design</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center gap-2">
                                <span>Topan</span>
                                <flux:badge color="green" size="sm" variant="solid">15%</flux:badge>
                            </div>
                            <span class="text-sm text-zinc-600 dark:text-zinc-200">Business Analysis</span>
                        </div>
                    </div>
                </flux:card.body>
            </flux:card>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">

            <!-- Workflow Timeline -->
            <flux:card>
                <flux:card.header>
                    <flux:heading size="lg">Project Workflow</flux:heading>
                </flux:card.header>
                <flux:card.body>
                    <div class="relative">
                        <div class="absolute h-full w-0.5 bg-zinc-200 dark:bg-zinc-700 left-[7px]"></div>
                        <div class="space-y-6 relative">
                            <!-- Zachran's Tasks -->
                            <div class="flex gap-4">
                                <div class="w-4 h-4 rounded-full bg-blue-500 mt-1.5"></div>
                                <div class="flex-1">
                                    <div class="font-medium">1-3. Initial Phase (Zachran)</div>
                                    <div class="text-sm text-zinc-600 dark:text-zinc-200">Approach Client → Pitching → Requirements Gathering</div>
                                </div>
                            </div>

                            <!-- Raista's Tasks -->
                            <div class="flex gap-4">
                                <div class="w-4 h-4 rounded-full bg-purple-500 mt-1.5"></div>
                                <div class="flex-1">
                                    <div class="font-medium">4. Design Phase (Raista)</div>
                                    <div class="text-sm text-zinc-600 dark:text-zinc-200">UX Workflow & Storyboard Creation</div>
                                </div>
                            </div>

                            <!-- Topan's Initial Tasks -->
                            <div class="flex gap-4">
                                <div class="w-4 h-4 rounded-full bg-green-500 mt-1.5"></div>
                                <div class="flex-1">
                                    <div class="font-medium">5-7. Business Documentation (Topan)</div>
                                    <div class="text-sm text-zinc-600 dark:text-zinc-200">Business Requirements → Invoice → Contract Agreement</div>
                                </div>
                            </div>

                            <!-- Adnin's Planning Tasks -->
                            <div class="flex gap-4">
                                <div class="w-4 h-4 rounded-full bg-amber-500 mt-1.5"></div>
                                <div class="flex-1">
                                    <div class="font-medium">8. Test Planning (Adnin)</div>
                                    <div class="text-sm text-zinc-600 dark:text-zinc-200">Test Plan Documentation</div>
                                </div>
                            </div>

                            <!-- Raista's UI/UX -->
                            <div class="flex gap-4">
                                <div class="w-4 h-4 rounded-full bg-purple-500 mt-1.5"></div>
                                <div class="flex-1">
                                    <div class="font-medium">9. UI/UX Design (Raista)</div>
                                    <div class="text-sm text-zinc-600 dark:text-zinc-200">UI/UX Design Implementation</div>
                                </div>
                            </div>

                            <!-- Adnin's Testing Tasks -->
                            <div class="flex gap-4">
                                <div class="w-4 h-4 rounded-full bg-amber-500 mt-1.5"></div>
                                <div class="flex-1">
                                    <div class="font-medium">10. Test Preparation (Adnin)</div>
                                    <div class="text-sm text-zinc-600 dark:text-zinc-200">Test Scenarios and Test Cases</div>
                                </div>
                            </div>

                            <!-- Zachran's Development -->
                            <div class="flex gap-4">
                                <div class="w-4 h-4 rounded-full bg-blue-500 mt-1.5"></div>
                                <div class="flex-1">
                                    <div class="font-medium">11. Development (Zachran)</div>
                                    <div class="text-sm text-zinc-600 dark:text-zinc-200">Website Development</div>
                                </div>
                            </div>

                            <!-- Final Phase -->
                            <div class="flex gap-4">
                                <div class="w-4 h-4 rounded-full bg-zinc-500 mt-1.5"></div>
                                <div class="flex-1">
                                    <div class="font-medium">12-17. Final Phase (All Team)</div>
                                    <div class="text-sm text-zinc-600 dark:text-zinc-200">
                                        Testing → Deployment → Documentation → Social Media
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </flux:card.body>
            </flux:card>

            <!-- Team Responsibilities -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
                <!-- Zachran Card -->
                <flux:card>
                    <flux:card.header>
                        <flux:heading size="lg">Zachran</flux:heading>
                    </flux:card.header>
                    <flux:card.body>
                        <ul class="list-disc list-inside text-sm space-y-2 text-zinc-600 dark:text-zinc-200">
                            <li>Approach Client</li>
                            <li>Pitching</li>
                            <li>Requirements Gathering</li>
                            <li>Fullstack Development</li>
                            <li>Domain & Hosting Setup</li>
                            <li>Deployment</li>
                        </ul>
                    </flux:card.body>
                </flux:card>

                <!-- Raista Card -->
                <flux:card>
                    <flux:card.header>
                        <flux:heading size="lg">Raista</flux:heading>
                    </flux:card.header>
                    <flux:card.body>
                        <ul class="list-disc list-inside text-sm space-y-2 text-zinc-600 dark:text-zinc-200">
                            <li>UX Workflow</li>
                            <li>UI/UX Design</li>
                            <li>Storyboard Creation</li>
                        </ul>
                    </flux:card.body>
                </flux:card>

                <!-- Adnin Card -->
                <flux:card>
                    <flux:card.header>
                        <flux:heading size="lg">Adnin</flux:heading>
                    </flux:card.header>
                    <flux:card.body>
                        <ul class="list-disc list-inside text-sm space-y-2 text-zinc-600 dark:text-zinc-200">
                            <li>Test Plan Documentation</li>
                            <li>Test Scenarios & Cases</li>
                            <li>Test Execution</li>
                            <li>Regression Testing</li>
                            <li>SRS Documentation</li>
                        </ul>
                    </flux:card.body>
                </flux:card>

                <!-- Topan Card -->
                <flux:card>
                    <flux:card.header>
                        <flux:heading size="lg">Topan</flux:heading>
                    </flux:card.header>
                    <flux:card.body>
                        <ul class="list-disc list-inside text-sm space-y-2 text-zinc-600 dark:text-zinc-200">
                            <li>Business Requirements</li>
                            <li>Invoice Management</li>
                            <li>Contract Management</li>
                            <li>Social Media Documentation</li>
                        </ul>
                    </flux:card.body>
                </flux:card>
            </div>
        </div>
    </flux:container>
</x-layouts.app>
