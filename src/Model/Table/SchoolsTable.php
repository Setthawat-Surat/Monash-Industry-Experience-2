<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Schools Model
 *
 * @property \App\Model\Table\CampaignsTable&\Cake\ORM\Association\HasMany $Campaigns
 *
 * @method \App\Model\Entity\School newEmptyEntity()
 * @method \App\Model\Entity\School newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\School> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\School get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\School findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\School patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\School> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\School|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\School saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\School>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\School>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\School>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\School> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\School>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\School>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\School>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\School> deleteManyOrFail(iterable $entities, array $options = [])
 */
class SchoolsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('schools');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->hasMany('Campaigns', [
            'foreignKey' => 'school_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->scalar('name')
            ->maxLength('name', 256)
            ->allowEmptyString('name');

        $validator
            ->scalar('rep_first_name')
            ->maxLength('rep_first_name', 256)
            ->allowEmptyString('rep_first_name');

        $validator
            ->scalar('rep_last_name')
            ->maxLength('rep_last_name', 256)
            ->allowEmptyString('rep_last_name');

        $validator
            ->scalar('rep_email')
            ->maxLength('rep_email', 256)
            ->allowEmptyString('rep_email');

        $validator
            ->scalar('address')
            ->maxLength('address', 256)
            ->allowEmptyString('address');

        $validator
            ->scalar('code')
            ->maxLength('code', 256)
            ->allowEmptyString('code');

        $validator
            ->scalar('bank_account_name')
            ->maxLength('bank_account_name', 256)
            ->allowEmptyString('bank_account_name');

        $validator
            ->scalar('bank_account_number')
            ->maxLength('bank_account_number', 256)
            ->allowEmptyString('bank_account_number');

        $validator
            ->scalar('bsb')
            ->maxLength('bsb', 256)
            ->allowEmptyString('bsb');

        $validator
            ->boolean('approval_status')
            ->allowEmptyString('approval_status');

        return $validator;
    }
}
