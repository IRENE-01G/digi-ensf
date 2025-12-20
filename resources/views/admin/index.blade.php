<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENSF Administration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
     <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo-ensf.jpg') }}">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8f9fa;
            color: #333;
        }

        /* Navbar */
        .navbar {
            background-color: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            padding: 1rem 2rem;
        }
        .navbar-brand {
            font-weight: 700;
            font-size: 1.5rem;
            color: #1e1e2d;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .navbar-brand span {
            color: #4a3aff; 
        }
        .btn-outline-primary-custom {
            color: #4a3aff;
            border-color: #e0e0e0;
            background: white;
        }
        .btn-outline-primary-custom:hover {
            background-color: #f8f9fa;
            color: #333;
            border-color: #ccc;
        }
        
        
        .nav-tabs {
            border-bottom: 0;
            margin-top: 1rem;
            padding: 0 2rem;
            background: #f8f9fa;
            background: white;
        }
        .header-container {
            background: white;
            border-bottom: 1px solid #e0e0e0;
        }
        .nav-link {
            color: #64748b;
            font-weight: 500;
            border: none;
            padding-bottom: 1rem;
            margin-right: 1.5rem;
        }
        .nav-link.active {
            color: #4a3aff;
            border-bottom: 2px solid #4a3aff;
            background: transparent;
        }
        .nav-link:hover {
            color: #333;
            border-color: transparent;
            isolation: isolate;
        }

        
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 1.5rem;
            border: 1px solid #f0f0f0;
            display: flex;
            align-items: center;
            gap: 1rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
        }
        .icon-box {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.25rem;
        }
        
        
        .search-container {
            background: white;
            padding: 1rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            border: 1px solid #f0f0f0;
            display: flex;
            gap: 1rem;
        }
        .form-control, .form-select {
            border: 1px solid #e2e8f0;
            padding: 0.6rem 1rem;
            border-radius: 8px;
        }
        
       
        .table-container {
            background: white;
            border-radius: 12px;
            padding: 0;
            border: 1px solid #f0f0f0;
            overflow: hidden;
        }
        .table th {
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.75rem;
            color: #64748b;
            letter-spacing: 0.05em;
            background-color: white;
            border-bottom: 1px solid #f0f0f0;
            padding: 1.25rem 1.5rem;
        }
        .table td {
            padding: 1.25rem 1.5rem;
            vertical-align: middle;
            color: #334155;
            border-bottom: 1px solid #f0f0f0;
        }
        .user-info h6 {
            margin: 0;
            font-weight: 600;
            color: #1e293b;
        }
        .user-info span {
            font-size: 0.85rem;
            color: #64748b;
        }
        
        /* Badges */
        .badge-status {
            padding: 0.5em 1em;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.85rem;
        }
        .badge-pending { background-color: #fff7ed; color: #c2410c; }
        .badge-valid { background-color: #f0fdf4; color: #15803d; } /* En cours / Validé mix? Mockup shows "En cours" (blue), "Accepté" (green), "Refusé" (red), "En attente" (yellow) */
        
        .status-en_attente { background-color: #fffbeb; color: #b45309; } /* Yellow */
        .status-en_cours { background-color: #eff6ff; color: #1d4ed8; } /* Blue */
        .status-accepte, .status-valide { background-color: #f0fdf4; color: #15803d; } /* Green */
        .status-refuse { background-color: #fef2f2; color: #b91c1c; } /* Red */

        /* Document Tags */
        .doc-tag {
            background: #f1f5f9;
            color: #475569;
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 0.8rem;
            margin-right: 4px;
            display: inline-block;
        }

        /* Action Buttons */
        .btn-icon {
            color: #4a3aff;
            background: transparent;
            border: none;
            padding: 4px;
            font-size: 1.1rem;
        }
        .btn-icon:hover {
            color: #3b2ecc;
        }
        .btn-download {
            color: #10b981;
        }
    </style>
</head>
<body>

<div class="header-container">
    <nav class="navbar">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <!-- Assuming Logo Image or Text -->
                <img src="{{ asset('assets/logo-ensf.jpg')}}" alt="Image" width="80" height="80" >
            <div class="d-flex align-items-center gap-3">
                <a href="{{ route('accueil') }}" class="btn btn-outline-primary-custom rounded-pill px-4">Retour accueil</a>
                <div class="d-flex align-items-center gap-2">
                    <!-- <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center" style="width: 35px; height: 35px;">
                        <i class="bi bi-person-fill"></i> -->
                    </div>
                    
                    <a href="{{ route('deconnexion') }}" class="btn btn-sm btn-outline-danger ms-2" title="Se déconnecter">se deconnecter<i class="bi bi-box-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="container-fluid px-4">
        <ul class="nav nav-tabs">
            <li class="nav-item">
                <a class="nav-link active" href="#"><i class="bi bi-card-list me-2"></i>Candidatures</a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-bar-chart me-2"></i>Statistiques</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="bi bi-people me-2"></i>Utilisateurs</a>
            </li> -->
        </ul>
    </div>
</div>

<div class="container-fluid px-4 py-4">
    
    <!-- Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-md-2 col-sm-6"> <!-- Using col-2 to fit 5 cards mostly, or auto wrap -->
             <div class="stat-card">
                <div class="icon-box bg-secondary text-white">
                    <i class="bi bi-files"></i>
                </div>
                <div>
                    <div class="text-muted small">Paiements</div>
                    <div class="h4 mb-0 fw-bold">{{ $stats['paiements'] }}</div>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-6">
             <div class="stat-card">
                <div class="icon-box" style="background-color: #f59e0b;">
                    <i class="bi bi-clock-history"></i>
                </div>
                <div>
                    <div class="text-muted small">En attente</div>
                    <div class="h4 mb-0 fw-bold">{{ $stats['en_attente'] }}</div>
                </div>
            </div>
        </div>
        <!-- <div class="col-md-2 col-sm-6">
             <div class="stat-card">
                <div class="icon-box" style="background-color: #3b82f6;">
                    <i class="bi bi-eye"></i>
                </div>
                <div>
                    <div class="text-muted small">En cours</div>
                    <div class="h4 mb-0 fw-bold">{{ $stats['en_cours'] }}</div>
                </div> 
            </div>
        </div> -->
        <div class="col-md-2 col-sm-6">
             <div class="stat-card">
                <div class="icon-box" style="background-color: #10b981;">
                    <i class="bi bi-check-lg"></i>
                </div>
                <div>
                    <div class="text-muted small">Acceptés</div>
                    <div class="h4 mb-0 fw-bold">{{ $stats['acceptes'] }}</div>
                </div>
            </div>
        </div>
         <div class="col-md-2 col-sm-6">
             <div class="stat-card">
                <div class="icon-box" style="background-color: #ef4444;">
                    <i class="bi bi-x-lg"></i>
                </div>
                <div>
                    <div class="text-muted small">Refusés</div>
                    <div class="h4 mb-0 fw-bold">{{ $stats['refuses'] }}</div>
                </div>
            </div>
        </div>
    </div><br><br>

    <!-- Filter Bar -->
    <!-- <div class="search-container">
        <div class="input-group">
            <span class="input-group-text bg-white border-end-0"><i class="bi bi-search text-muted"></i></span>
            <input type="text" class="form-control border-start-0 ps-0" placeholder="Rechercher par nom, email, formation...">
        </div>
        <select class="form-select w-auto" style="min-width: 200px;">
            <option selected>Tous les statuts</option>
            <option value="en_attente">En attente</option>
            <option value="en_cours">En cours</option>
            <option value="accepte">Accepté</option>
            <option value="refuse">Refusé</option>
        </select>
    </div> -->

    <!-- Main Table -->
    <div class="table-container">
        <table class="table mb-0 table-hover">
            <thead>
                <tr>
                    <th>Candidat</th>
                    <th>Formation</th>
                    <th>Date de dépôt</th>
                    <th>Statut</th>
                    <th>Documents</th>
                    <th class="text-end">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($candidatures as $candidature)
                <tr>
                    <td>
                        <div class="user-info">
                            <h6>{{ $candidature->user->name ?? 'Nom Inconnu' }}</h6>
                            <span>{{ $candidature->user->email ?? 'Email Inconnu' }}</span>
                        </div>
                    </td>
                    <td>{{ $candidature->titre ?? 'Non spécifié' }}</td>
                    <td>{{ $candidature->created_at->format('d/m/Y') }}</td>
                    <td>
                        @php
                            $statusClass = 'badge-pending';
                            $statusText = 'En attente';
                            switch($candidature->statut) {
                                case 'en_attente': $statusClass = 'status-en_attente'; $statusText = 'En attente'; break;
                                case 'en_cours': $statusClass = 'status-en_cours'; $statusText = 'En cours'; break;
                                case 'accepte': 
                                case 'valide':
                                    $statusClass = 'status-accepte'; $statusText = 'Accepté'; break;
                                case 'refuse': $statusClass = 'status-refuse'; $statusText = 'Refusé'; break;
                                default: $statusClass = 'status-en_attente'; $statusText = $candidature->statut;
                            }
                        @endphp
                        <span class="badge badge-status {{ $statusClass }}">
                            {{ $statusText }}
                        </span>
                    </td>
                    <td>
                        @if($candidature->dossier)
                             @if($candidature->dossier->acte_naissance)<span class="doc-tag">Acte Naiss.</span>@endif
                             @if($candidature->dossier->nationalite)<span class="doc-tag">Nationalité</span>@endif
                             @if($candidature->dossier->bac)<span class="doc-tag">BAC</span>@endif
                             @if($candidature->dossier->casier)<span class="doc-tag">Casier Jud.</span>@endif
                             @if($candidature->dossier->medical)<span class="doc-tag">Cert. Méd.</span>@endif
                             @if($candidature->dossier->note_service)<span class="doc-tag">Note Svc.</span>@endif
                             @if($candidature->dossier->lettre_motivation)<span class="doc-tag">Lettre Mot.</span>@endif
                        @else
                            <span class="text-muted small">Aucun document</span>
                        @endif
                    </td>
                    <td class="text-end">
                        <div class="d-flex gap-2 justify-content-end">
                            <button class="btn-icon" title="Voir" 
                                data-bs-toggle="modal" 
                                data-bs-target="#detailModal"
                                data-name="{{ $candidature->user->name ?? 'N/A' }}"
                                data-email="{{ $candidature->user->email ?? 'N/A' }}"
                                data-formation="{{ $candidature->titre ?? 'N/A' }}"
                                data-date="{{ $candidature->created_at->format('d/m/Y') }}"
                                data-status="{{ $candidature->statut }}"
                                data-docs="{{ $candidature->dossier ? json_encode([
                                    'acte_naissance' => $candidature->dossier->acte_naissance,
                                    'nationalite' => $candidature->dossier->nationalite,
                                    'bac' => $candidature->dossier->bac,
                                    'casier' => $candidature->dossier->casier,
                                    'medical' => $candidature->dossier->medical,
                                    'note_service' => $candidature->dossier->note_service,
                                    'lettre_motivation' => $candidature->dossier->lettre_motivation
                                ]) : '{}' }}"
                            >
                                <i class="bi bi-eye"></i>
                            </button>
                            
                            @if($candidature->statut === 'en_attente' )
                            <form action="{{ route('admin.valider', $candidature->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success" title="Valider"><i class="bi bi-check-lg"></i></button>
                            </form>
                            <form action="{{ route('admin.rejeter', $candidature->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger" title="Rejeter"><i class="bi bi-x-lg"></i></button>
                            </form>
                            @endif
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">Aucune candidature trouvée.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>


    <!-- Detail Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title fw-bold">Détails Candidature</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row mb-4">
                        <div class="col-md-6 border-end">
                            <h6 class="text-uppercase text-muted small fw-bold mb-3">Informations Candidat</h6>
                            <p class="mb-1"><strong>Nom:</strong> <span id="modalName"></span></p>
                            <p class="mb-1"><strong>Email:</strong> <span id="modalEmail"></span></p>
                            <p class="mb-1"><strong>Formation:</strong> <span id="modalFormation"></span></p>
                            <p class="mb-0"><strong>Date dépôt:</strong> <span id="modalDate"></span></p>
                        </div>
                        <div class="col-md-6 ps-4">
                             <h6 class="text-uppercase text-muted small fw-bold mb-3">Statut</h6>
                             <span id="modalStatus" class="badge badge-status"></span>
                        </div>
                    </div>
                    
                    <h6 class="text-uppercase text-muted small fw-bold mb-3">Documents Soumis</h6>
                    <div class="list-group list-group-flush" id="modalDocs">
                        <!-- Docs inserted via JS -->
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Fermer</button>
                    <!-- Actions can be duplicated here if needed -->
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        const detailModal = document.getElementById('detailModal');
        detailModal.addEventListener('show.bs.modal', event => {
            const button = event.relatedTarget;
            
            // Extract info from data attributes
            const name = button.getAttribute('data-name');
            const email = button.getAttribute('data-email');
            const formation = button.getAttribute('data-formation');
            const date = button.getAttribute('data-date');
            const status = button.getAttribute('data-status');
            const docs = JSON.parse(button.getAttribute('data-docs'));
            
            // Update Modal Content
            document.getElementById('modalName').textContent = name;
            document.getElementById('modalEmail').textContent = email;
            document.getElementById('modalFormation').textContent = formation;
            document.getElementById('modalDate').textContent = date;
            
            const badgeSpan = document.getElementById('modalStatus');
            badgeSpan.textContent = status;
            badgeSpan.className = 'badge badge-status'; // Reset
            
            if(status === 'en_attente') badgeSpan.classList.add('status-en_attente');
            else if(status === 'en_cours') badgeSpan.classList.add('status-en_cours');
            else if(status === 'accepte' || status === 'valide') badgeSpan.classList.add('status-accepte');
            else if(status === 'refuse') badgeSpan.classList.add('status-refuse');
            
            const docsContainer = document.getElementById('modalDocs');
            docsContainer.innerHTML = '';
            
            if(Object.keys(docs).length > 0) {
                for (const [key, path] of Object.entries(docs)) {
                    if(path) {
                        const cleanName = key.replace('_', ' ').toUpperCase();
                        const link = `{{ asset('storage') }}/${path}`;
                        const item = `<a href="${link}" target="_blank" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                                        <div><i class="bi bi-file-earmark-text me-2 text-primary"></i> ${cleanName}</div>
                                        <i class="bi bi-box-arrow-up-right text-muted small"></i>
                                      </a>`;
                        docsContainer.insertAdjacentHTML('beforeend', item);
                    }
                }
            } else {
                 docsContainer.innerHTML = '<div class="text-muted small p-2">Aucun document disponible.</div>';
            }
        })
    </script>
</body>
</html>
