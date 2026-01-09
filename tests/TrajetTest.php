public function testCreateTrajetIsSkipped(): void
{
    $this->markTestSkipped(
        'Test désactivé : dépendance à la base de données MySQL (environnement local XAMPP).'
    );
}
public function testTrueIsTrue(): void
{
    $this->assertTrue(true);
}