<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Campaigns Model
 *
 * @property \App\Model\Table\SchoolsTable&\Cake\ORM\Association\BelongsTo $Schools
 * @property \App\Model\Table\DesignDraftsTable&\Cake\ORM\Association\HasMany $DesignDrafts
 *
 * @method \App\Model\Entity\Campaign newEmptyEntity()
 * @method \App\Model\Entity\Campaign newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Campaign> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Campaign get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Campaign findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Campaign patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Campaign> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Campaign|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Campaign saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Campaign>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Campaign>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Campaign>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Campaign> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Campaign>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Campaign>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Campaign>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Campaign> deleteManyOrFail(iterable $entities, array $options = [])
 */
class CampaignsTable extends Table
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

        $this->setTable('campaigns');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Schools', [
            'foreignKey' => 'school_id',
        ]);
        $this->hasMany('DesignDrafts', [
            'foreignKey' => 'campaign_id',
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
            ->scalar('default_sales_price')
            ->maxLength('default_sales_price', 256)
            ->allowEmptyString('default_sales_price');

        $validator
            ->scalar('total_fund_raised')
            ->maxLength('total_fund_raised', 256)
            ->allowEmptyString('total_fund_raised');

        $validator
            ->date('start_date')
            ->allowEmptyDate('start_date');

        $validator
            ->date('end_date')
            ->allowEmptyDate('end_date');

        $validator
            ->integer('school_id')
            ->allowEmptyString('school_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['school_id'], 'Schools'), ['errorField' => 'school_id']);

        return $rules;
    }
}
