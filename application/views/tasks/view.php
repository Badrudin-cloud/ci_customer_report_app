<div class="card border-primary mb-3">
    <div class="card-header">
        <h2>Company name: <?= $title ?></h2>
        Phone: <?php echo $task['contact_phone']; ?>
        Address: <?php echo $task['address']; ?>
        
        <small class="card-title float-end">Issue date: <?php echo $task['issue_date']; ?></small>

    </div>

    <div class="card-body">
        <h3>Reported Issue</h3>
        <p class="card-text"><?php echo $task['reported_issue']; ?></p>
        <h3>What caused the issue?</h3>
        <p class="card-text"><?php echo $task['reason']; ?></p>
        <h3>Status</h3>
        <?php if ($task['status'] === 'fixed') { ?>
            <span class="badge bg-info"><?php echo $task['status']; ?></span>
            <small class="float-end">Fixed Date: <?php echo $task['fixed_date']; ?></small>
        <?php } else { ?>
            <span class="badge bg-primary"><?php echo $task['status']; ?></span>
        <?php } ?>
        <br>
        <br>

        <h3>Engineer's name</h3>
        <p class="card-text"><?php echo $task['done_by']; ?></p>
    
    </div>
</div>

</div>